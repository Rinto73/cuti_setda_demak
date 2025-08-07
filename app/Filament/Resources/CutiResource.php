<?php

namespace App\Filament\Resources;

use Closure;
use Carbon\Carbon;
use Filament\Forms;
use App\Models\Cuti;
use Filament\Tables;
use App\Models\Pegawai;
use Filament\Forms\Get;
use Filament\Forms\Set;
use App\Models\TypeCuti;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Support\CutiFormHelpers;
use Filament\Resources\Resource;
use App\Support\CutiFormCalculator;
use App\Support\CutiSnapshotHelper;
use Filament\Forms\Components\Grid;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Facades\Storage;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\CutiResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CutiResource\RelationManagers;
use Filament\Forms\Components\Section;

class CutiResource extends Resource
{
    protected static ?string $model = Cuti::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Pengajuan Cuti';
    protected static ?string $navigationGroup = 'Pengajuan Cuti';
    protected static ?string $title = 'Form Pengajuan Cuti';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(2)->schema([
                    Hidden::make('user_id')
                        ->default(auth()->id()),

                    DatePicker::make('tanggal_pengajuan')
                        ->label('Tanggal Pengajuan')
                        ->required()
                        ->default(now())
                        ->columnSpanFull(),

                    Section::make('Informasi Pegawai')
                        ->schema([
                            Grid::make(2)->schema([
                                Select::make('pegawai_id')
                                    ->label('Nama Pegawai')
                                    ->options(Pegawai::pluck('nama', 'id'))
                                    ->searchable()
                                    ->required()
                                    ->reactive()
                                    ->afterStateUpdated(function ($state, callable $set) {
                                        if ($state) {
                                            $pegawai = Pegawai::find($state);
                                            if ($pegawai) {
                                                $set('nip', $pegawai->nip);
                                                $set('jabatan', $pegawai->jabatan);
                                                $set('unit_kerja', $pegawai->unit_kerja);
                                                $set('masa_kerja', $pegawai->masa_kerja);
                                                $set('status_asn', strtolower($pegawai->status_asn));
                                            }
                                            $snapshot = CutiSnapshotHelper::getPegawaiCutiSnapshot($state);

                                            // Set nilai awal (tetap) dan nilai aktif
                                            $set('sisa_cuti_awal', $snapshot['sisa_cuti_n']);
                                            $set('sisa_cuti_n', $snapshot['sisa_cuti_n']);

                                            $set('sisa_cuti_n2', $snapshot['sisa_cuti_n2']);
                                            $set('sisa_cuti_n1', $snapshot['sisa_cuti_n1']);
                                            // $set('sisa_cuti_n', $snapshot['sisa_cuti_n']);
                                        }
                                        $set('type_cuti_id', null);
                                    })
                                    ->afterStateHydrated(function ($state, $set, $get) {
                                        if ($state) {
                                            $snapshot = \App\Support\CutiSnapshotHelper::getPegawaiCutiSnapshot($state);
                                            $set('sisa_cuti_awal', $snapshot['sisa_cuti_n']);
                                        }
                                    }),
                                TextInput::make('nip')
                                    ->disabled()
                                    ->dehydrated(false)
                                    ->afterStateHydrated(
                                        fn($state, $set, $get) =>
                                        CutiFormHelpers::hydrateMultipleFields($state, $set, $get, ['nip', 'jabatan', 'unit_kerja', 'masa_kerja'])
                                    ),
                            ]),
                            Grid::make(3)->schema([

                                TextInput::make('jabatan')
                                    ->disabled()
                                    ->dehydrated(false),

                                TextInput::make('unit_kerja')
                                    ->disabled()
                                    ->dehydrated(false),

                                TextInput::make('masa_kerja')
                                    ->disabled()
                                    ->dehydrated(false),
                            ]),
                        ]),
                ]),

                Section::make('Informasi Pengajuan Cuti')
                    ->schema([
                        Grid::make(4)->schema([
                            Select::make('type_cuti_id')
                                ->label('Jenis Cuti')
                                ->reactive()
                                ->options(function (Get $get) {
                                    $status = $get('status_asn');

                                    if (! $status) {
                                        return TypeCuti::pluck('nama', 'id')->toArray();
                                    }

                                    return TypeCuti::whereJsonContains('status_berlaku', $status)
                                        ->pluck('nama', 'id')
                                        ->toArray();
                                })
                                ->searchable()
                                ->required(),

                            DatePicker::make('tanggal_mulai')
                                ->label('Tanggal Mulai')
                                ->required()
                                ->reactive()
                                ->afterStateUpdated(function ($state, callable $get, callable $set) {
                                    $lamaCuti = $get('lama_cuti');
                                    if ($state && $lamaCuti) {
                                        $tanggalSelesai = \Illuminate\Support\Carbon::parse($state)->addDays($lamaCuti - 1);
                                        $set('tanggal_selesai', $tanggalSelesai->format('Y-m-d'));
                                    }
                                }),

                            TextInput::make('lama_cuti')
                                ->label('Lama Cuti (hari)')
                                ->required()
                                ->numeric()
                                ->minValue(1)
                                ->reactive()
                                ->afterStateUpdated(function ($state, callable $get, callable $set) {
                                    // ⏱️ Hitung tanggal selesai
                                    $tanggalMulai = $get('tanggal_mulai');
                                    if ($state && $tanggalMulai) {
                                        $tanggalSelesai = \Illuminate\Support\Carbon::parse($tanggalMulai)->addDays($state - 1);
                                        $set('tanggal_selesai', $tanggalSelesai->format('Y-m-d'));
                                    }

                                    $pegawaiId = $get('pegawai_id');
                                    $typeId = $get('type_cuti_id');
                                    $sisaAwal = $get('sisa_cuti_awal') ?? 0;
                                    $tahun = now()->year;

                                    if (! $pegawaiId || ! $typeId) return;

                                    $type = \App\Models\TypeCuti::find($typeId);
                                    if (! $type) return;

                                    $maksHari = $type->maks_hari ?? null;

                                    // 🧮 Hitung sisa cuti jika CT
                                    if (strtolower($type->nama) === 'cuti tahunan') {
                                        $set('sisa_cuti_n', \App\Support\CutiFormCalculator::calculateSisaCuti($sisaAwal, $state));
                                    }

                                    // 🔎 Validasi dan reset jika tidak sesuai
                                    if ($type->kode === 'CT') {
                                        $sisa = \App\Models\SisaCutiTahunan::where('pegawai_id', $pegawaiId)
                                            ->where('tahun', $tahun)
                                            ->value('sisa_hari') ?? 0;

                                        if ($state > $sisa || $state <= 0) {
                                            $set('lama_cuti', 0);
                                            \Filament\Notifications\Notification::make()
                                                ->title('⛔ Lama cuti tidak valid')
                                                ->body("Sisa cuti tahun ini: $sisa hari. Silakan isi nilai yang sesuai.")
                                                ->danger()
                                                ->send();
                                        }
                                    } elseif ($maksHari && ($state > $maksHari || $state <= 0)) {
                                        $set('lama_cuti', 0);
                                        \Filament\Notifications\Notification::make()
                                            ->title('⚠️ Melebihi batas maksimal cuti')
                                            ->body("Batas cuti untuk {$type->nama}: {$maksHari} hari.")
                                            ->danger()
                                            ->send();
                                    }
                                })
                                ->rules([
                                    fn(callable $get) => \App\Support\CutiValidator::ruleLamaCuti(
                                        $get('pegawai_id'),
                                        $get('type_cuti_id')
                                    )
                                ])
                                ->helperText(function (callable $get) {
                                    return \App\Support\CutiValidator::helperText(
                                        $get('pegawai_id'),
                                        $get('type_cuti_id')
                                    );
                                }),

                            DatePicker::make('tanggal_selesai')
                                ->label('Tanggal Selesai')
                                ->disabled()
                                ->dehydrated(),
                        ]),


                        Grid::make(3)->schema([
                            TextInput::make('sisa_cuti_n2')
                                ->disabled()
                                ->dehydrated(false)
                                ->afterStateHydrated(
                                    fn($state, $set, $get) =>
                                    CutiSnapshotHelper::hydrateSisaCutiFields($state, $set, $get)
                                ),

                            TextInput::make('sisa_cuti_n1')
                                ->disabled()
                                ->dehydrated(false),

                            TextInput::make('sisa_cuti_n')
                                ->disabled()
                                ->dehydrated(false)
                                ->numeric()
                                ->afterStateHydrated(function ($state, $set, $get) {
                                    $typeCutiId = $get('type_cuti_id');
                                    $typeCuti = \App\Models\TypeCuti::find($typeCutiId);
                                    $lamaCuti = $get('lama_cuti');
                                    $sisaAwal = $get('sisa_cuti_awal');

                                    if ($typeCuti && strtolower($typeCuti->nama) === 'cuti tahunan' && $lamaCuti && $sisaAwal !== null) {
                                        $set('sisa_cuti_n', \App\Support\CutiFormCalculator::calculateSisaCuti($sisaAwal, $lamaCuti));
                                    }
                                }),

                            Hidden::make('sisa_cuti_awal')
                                ->disabled()
                                ->dehydrated(false),

                        ]),
                        Textarea::make('alasan')
                            ->label('Alasan Cuti')
                            ->nullable()
                            ->columnSpanFull(),

                        Grid::make(2)->schema([
                            TextInput::make('alamat')
                                ->label('Alamat Selama Menjalankan Cuti')
                                ->nullable(),

                            TextInput::make('telp')
                                ->label('Telephone yang Mudah Dihubungi')
                                ->nullable(),
                        ]),
                    ]),

                Section::make('Informasi Pimpinan')
                    ->schema([
                        Grid::make(2)->schema([
                            Select::make('atasan_id')
                                ->label('Atasan Langsung')
                                ->options(function () {
                                    $atasanIds = \App\Models\AtasanPejabat::where('tanda_tangan', 'atasan')->pluck('pejabat_id');
                                    return \App\Models\Pegawai::whereIn('id', $atasanIds)->pluck('nama', 'id');
                                })
                                ->searchable()
                                ->nullable(),

                            Select::make('pejabat_id')
                                ->label('Pejabat Yang Berwenang')
                                ->options(function () {
                                    $pejabatIds = \App\Models\AtasanPejabat::where('tanda_tangan', 'pejabat')->pluck('pejabat_id');
                                    return \App\Models\Pegawai::whereIn('id', $pejabatIds)->pluck('nama', 'id');
                                })
                                ->searchable()
                                ->nullable(),
                        ]),
                    ]),

                FileUpload::make('dokumen')
                    ->label('Upload Dokumen Pendukung')
                    ->disk('public')
                    ->directory('lampiran')
                    ->maxSize(1024) // dalam KB → 1MB
                    ->required()
                    ->rules(['required', 'file', 'max:1024']), // Validasi Laravel-style

                Grid::make(1)->schema([
                    Hidden::make('status_asn')
                        ->dehydrated(false),
                ])
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('pegawai.nama')
                    ->label('Pemohon')->searchable(),
                TextColumn::make('typeCuti.nama')->label('Jenis Cuti'),
                TextColumn::make('tanggal_mulai')->date(),
                TextColumn::make('tanggal_selesai')->date(),
                TextColumn::make('lama_cuti')->label('Lama'),
                BadgeColumn::make('status')->colors([
                    'primary' => 'menunggu',
                    'success' => 'disetujui',
                    'danger' => 'ditolak',
                ]),
            ])
            ->defaultSort('tanggal_mulai', 'desc')

            ->filters([
                //
            ])
            ->actions([
                Action::make('ubahStatus')
                    ->label('Ubah Status')
                    ->icon('heroicon-o-arrow-path-rounded-square')
                    ->requiresConfirmation()
                    ->color('success')
                    ->form([
                        Select::make('status')
                            ->label('Pilih Status Persetujuan')
                            ->required()
                            ->options([
                                'disetujui' => 'Disetujui',
                                'ditolak' => 'Ditolak',
                                'menunggu' => 'Perlu Revisi',
                            ])
                    ])
                    ->visible(fn() => auth()->user()?->role === 'kabag') // ⬅️ KONDISI di sini
                    ->modalHeading('Konfirmasi Perubahan Status')
                    ->modalDescription('Yakin ingin mengubah status cuti ini? Perubahan akan langsung disimpan.')
                    ->modalSubmitActionLabel('Ya, Simpan Persetujuan')
                    ->modalCancelActionLabel('Batalkan')
                    ->action(function ($record, array $data) {
                        $record->update([
                            'status' => $data['status'],
                        ]);
                    }),

                Action::make('preview')
                    ->label('Preview')
                    ->icon('heroicon-o-eye')
                    ->color('gray')
                    ->visible(fn() => auth()->user()?->role === 'kabag') // ⬅️ KONDISI di sini
                    ->modalHeading('Preview Dokumen')
                    ->modalContent(fn($record) => view('components.preview-file', [
                        'cuti' => $record,
                        'fileUrl' => Storage::url($record->dokumen),
                        'extension' => pathinfo($record->dokumen, PATHINFO_EXTENSION),
                    ]))
                    ->modalWidth('2xl')
                    ->modalFooterActions([
                        Action::make('downloadFile')
                            ->label('Download')
                            ->url(fn($record) => Storage::url($record->dokumen))
                            ->openUrlInNewTab(), // Bisa juga pakai ->download() kalau pakai Filament v3 dan Laravel 10
                    ]),


                Tables\Actions\EditAction::make()
                    ->visible(
                        fn($record) =>
                        auth()->user()->is($record->user) || auth()->user()->role === 'admin'
                    ),
                Tables\Actions\DeleteAction::make()
                    ->visible(
                        fn($record) =>
                        auth()->user()->is($record->user) || auth()->user()->role === 'admin'
                    ),

            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->whereIn('status', ['menunggu', 'ditolak']);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCutis::route('/'),
            'create' => Pages\CreateCuti::route('/create'),
            'edit' => Pages\EditCuti::route('/{record}/edit'),
        ];
    }
}
