<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\TypeCuti;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\BadgeColumn;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\TypeCutiResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\TypeCutiResource\RelationManagers;

class TypeCutiResource extends Resource
{
    protected static ?string $model = TypeCuti::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    protected static ?string $navigationLabel = 'Jenis Cuti';
    protected static ?string $navigationGroup = 'Data Master';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('kode')->required()->unique(),
                TextInput::make('nama')->required(),
                Textarea::make('deskripsi'),
                TextInput::make('maks_hari')->numeric()->nullable(),
                Toggle::make('butuh_dokumen'),
                Toggle::make('butuh_approval'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kode')
                    ->label('Kode')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('nama')
                    ->label('Nama Cuti')
                    ->searchable()
                    ->limit(30),

                TextColumn::make('maks_hari')
                    ->label('Maks Hari'),

                BadgeColumn::make('butuh_dokumen')
                    ->label('Butuh Dokumen?')
                    ->colors([
                        'success' => fn($state) => $state === true,
                        'danger' => fn($state) => $state === false,
                    ])
                    ->formatStateUsing(fn($state) => $state ? 'Ya' : 'Tidak'),

                BadgeColumn::make('butuh_approval')
                    ->label('Perlu Persetujuan?')
                    ->colors([
                        'warning' => fn($state) => $state === true,
                        'gray' => fn($state) => $state === false,
                    ])
                    ->formatStateUsing(fn($state) => $state ? 'Ya' : 'Tidak'),

                TextColumn::make('deskripsi')
                    ->label('Keterangan')
                    ->limit(50)
                    ->wrap()
                    ->tooltip(fn($state) => $state),

            ])
            ->filters([
                Filter::make('status_berlaku')
                    ->form([
                        Select::make('statuses')
                            ->multiple()
                            ->options([
                                'pns' => 'PNS',
                                'pppk' => 'PPPK',
                            ])
                            ->label('Status ASN Berlaku'),
                    ])
                    ->query(function (Builder $query, array $data) {
                        if (!empty($data['statuses'])) {
                            foreach ($data['statuses'] as $status) {
                                $query->whereJsonContains('status_berlaku', $status);
                            }
                        }
                    }),
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
            'index' => Pages\ListTypeCutis::route('/'),
            'create' => Pages\CreateTypeCuti::route('/create'),
            'edit' => Pages\EditTypeCuti::route('/{record}/edit'),
        ];
    }
}
