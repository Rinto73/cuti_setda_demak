<?php

namespace App\Filament\Resources\SisaCutiTahunanResource\Pages;

use App\Filament\Resources\SisaCutiTahunanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSisaCutiTahunan extends EditRecord
{
    protected static string $resource = SisaCutiTahunanResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getHeaderActions(): array
    {
        return [
            // Actions\DeleteAction::make(),
        ];
    }
}
