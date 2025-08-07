<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Pegawai;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\AtasanPejabat;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\BadgeColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\AtasanPejabatResource\Pages;
use App\Filament\Resources\AtasanPejabatResource\RelationManagers;

class AtasanPejabatResource extends Resource
{
    protected static ?string $model = AtasanPejabat::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationLabel = 'Atasan dan Pejabat';
    protected static ?string $navigationGroup = 'Data Master';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('pejabat_id')
                    ->label('Pejabat Penandatangan')
                    ->relationship('pejabat', 'nama')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $set) {
                        $pegawai = Pegawai::find($state);
                        $set('jabatan', $pegawai?->jabatan);
                    }),

                Textarea::make('jabatan')
                    ->label('Jabatan Pegawai')
                    ->disabled()
                    ->dehydrated(false)
                    ->default(function ($get, $record) {
                        // Prioritaskan nilai dari pilihan user (create)
                        $pegawaiId = $get('pejabat_id') ?? $record?->pejabat_id;

                        return \App\Models\Pegawai::find($pegawaiId)?->jabatan;
                    }),

                Select::make('tanda_tangan')
                    ->label('Kewenangan')
                    ->options([
                        'atasan' => 'Atasan Langsung',
                        'pejabat' => 'Pejabat yang Berwenang',
                    ])
                    ->default(fn($record) => $record?->tanda_tangan)

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('pejabat.nama')
                    ->label('Pejabat Penandatangan')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('pejabat.jabatan')
                    ->label('Kewenangan'),

                BadgeColumn::make('tanda_tangan')
                    ->label('Atasan Langsung')
                    ->formatStateUsing(function ($state) {
                        return [
                            'atasan' => 'Atasan Langsung',
                            'pejabat' => 'Pejabat yang Berwenang',
                        ][$state] ?? $state;
                    })
                    ->colors([
                        'success' => 'atasan',
                        'warning' => 'pejabat',
                    ]),

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
            'index' => Pages\ListAtasanPejabats::route('/'),
            'create' => Pages\CreateAtasanPejabat::route('/create'),
            'edit' => Pages\EditAtasanPejabat::route('/{record}/edit'),
        ];
    }
}
