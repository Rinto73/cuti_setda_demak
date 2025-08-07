<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Pegawai;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Split;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PegawaiResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PegawaiResource\RelationManagers;

class PegawaiResource extends Resource
{
    protected static ?string $model = Pegawai::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationLabel = 'Data Pegawai';
    protected static ?string $navigationGroup = 'Data Master';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Split::make([
                    Section::make([
                        Forms\Components\TextInput::make('nip')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->label('NIP'),

                        Forms\Components\TextInput::make('nama')
                            ->required(),

                        Forms\Components\TextInput::make('jabatan')
                            ->required(),

                        Forms\Components\Select::make('unit_kerja')
                            ->options([
                                'umum' => 'Bagian Umum',
                                'prokompim' => 'Bagian Prokompim',
                                'organisasi' => 'Bagian Organisasi',
                                'pemerintahan' => 'Bagian Pemerintahan',
                                'kesra' => 'Bagian Kesra',
                                'hukum' => 'Bagian Hukum',
                                'admpem' => 'Bagian Adm. Pembangunan',
                                'perek' => 'Bagian Perekonomian dan SDA',
                                'pbj' => 'Bagian PBJ',
                                'bkpsdm' => 'BKPSDM',
                            ])
                            ->dehydrated()
                            ->required(),

                        Forms\Components\Select::make('status_asn')
                            ->options([
                                'pns' => 'PNS',
                                'pppk' => 'PPPK',
                            ])
                            ->required(),
                    ])->grow()
                        ->columns(2),
                    Section::make([
                        Forms\Components\FileUpload::make('avatar_url')
                            ->label('Foto Pegawai')
                            ->avatar()
                            ->image()
                            ->directory('pegawai'),
                    ])->grow(false),
                ])
                    ->from('2xl') // Tampilan lebar & nyaman di desktop
                    ->columnSpanFull(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nip')->searchable(),
                Tables\Columns\TextColumn::make('nama')->searchable(),
                Tables\Columns\TextColumn::make('jabatan'),
                Tables\Columns\TextColumn::make('unit_kerja')
                    ->label('Unit Kerja')
                    ->formatStateUsing(function ($state) {
                        return [
                            'umum' => 'Bagian Umum',
                            'prokompim' => 'Bagian Prokompim',
                            'organisasi' => 'Bagian Organisasi',
                            'pemerintahan' => 'Bagian Pemerintahan',
                            'kesra' => 'Bagian Kesra',
                            'hukum' => 'Bagian Hukum',
                            'admpem' => 'Bagian Adm. Pembangunan',
                            'perek' => 'Bagian Perekonomian dan SDA',
                            'pbj' => 'Bagian PBJ',
                            'bkpsdm' => 'BKPSDM',
                        ][$state] ?? $state;
                    }),

                Tables\Columns\BadgeColumn::make('status_asn')
                    ->formatStateUsing(function ($state) {
                        return [
                            'pns' => 'PNS',
                            'pppk' => 'PPPK',
                        ][$state] ?? $state;
                    })
                    ->colors([
                        'success' => 'pns',
                        'warning' => 'pppk',
                    ]),
                Tables\Columns\ImageColumn::make('avatar_url')
                    ->label('Foto Pegawai')
                    ->circular(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListPegawais::route('/'),
            'create' => Pages\CreatePegawai::route('/create'),
            'edit' => Pages\EditPegawai::route('/{record}/edit'),
        ];
    }
}
