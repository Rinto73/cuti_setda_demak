<?php

namespace App\Filament\Resources\SisaCutiTahunanResource\Pages;

use App\Filament\Resources\SisaCutiTahunanResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSisaCutiTahunan extends CreateRecord
{
    protected static string $resource = SisaCutiTahunanResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
