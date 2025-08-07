<?php

namespace App\Filament\Resources\TypeCutiResource\Pages;

use App\Filament\Resources\TypeCutiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTypeCuti extends EditRecord
{
    protected static string $resource = TypeCutiResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
