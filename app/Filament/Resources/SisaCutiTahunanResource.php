<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\SisaCutiTahunan;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SisaCutiTahunanResource\Pages;
use App\Filament\Resources\SisaCutiTahunanResource\RelationManagers;

class SisaCutiTahunanResource extends Resource
{
    protected static ?string $model = SisaCutiTahunan::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';
    protected static ?string $navigationLabel = 'Sisa Cuti Tahunan';
    protected static ?string $navigationGroup = 'Data Master';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('pegawai_id')
                    ->label('Pegawai')
                    ->relationship('pegawai', 'nama')
                    ->searchable()
                    ->required(),

                TextInput::make('tahun')
                    ->label('Tahun')
                    ->numeric()
                    ->minValue(2020)
                    ->maxValue(now()->year + 1)
                    ->required(),

                TextInput::make('sisa_hari')
                    ->label('Sisa Hari')
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(12)
                    ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('pegawai.nama')
                    ->label('Pegawai')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('tahun')
                    ->label('Tahun')
                    ->sortable()
                    ->alignCenter(),

                TextColumn::make('sisa_hari')
                    ->label('Sisa Hari')
                    ->sortable()
                    ->formatStateUsing(fn($state) => $state . ' hari')
                    ->color(fn($state) => match (true) {
                        $state <= 3 => 'danger',
                        $state <= 7 => 'warning',
                        default => 'success',
                    }),

                TextColumn::make('created_at')
                    ->label('Update')
                    ->date('d M Y'),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListSisaCutiTahunans::route('/'),
            'create' => Pages\CreateSisaCutiTahunan::route('/create'),
            'edit' => Pages\EditSisaCutiTahunan::route('/{record}/edit'),
        ];
    }
}
