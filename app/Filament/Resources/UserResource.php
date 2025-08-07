<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\UserResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\UserResource\RelationManagers;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationLabel = 'Pengguna';
    protected static ?string $navigationGroup = 'Settings';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required()->maxLength(100),
                TextInput::make('email')->email()->required(),
                Select::make('role')
                    ->options([
                        'admin' => 'Admin',
                        'user' => 'Operator',
                        'kabag' => 'Kepala Bagian',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('password')
                    ->password()
                    ->dehydrated(fn($state) => filled($state))
                    ->required(fn(string $context): bool => $context === 'create')
                    ->revealable(),

                Forms\Components\FileUpload::make('avatar_url')
                    ->label('Foto User')
                    ->avatar()
                    ->image()
                    ->directory('avatars'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable(),
                TextColumn::make('email'),
                TextColumn::make('role')->badge()
                    ->colors([
                        'success' => 'admin',
                        'info' => 'user',
                        'danger' => 'kabag',
                    ]),
                // ->color(fn($state) => $state === 'admin' ? 'success' : 'gray'),
                Tables\Columns\ImageColumn::make('avatar_url')
                    ->label('Foto Pengguna')
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
