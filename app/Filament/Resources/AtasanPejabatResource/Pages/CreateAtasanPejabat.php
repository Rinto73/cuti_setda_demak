<?php

namespace App\Filament\Resources\AtasanPejabatResource\Pages;

use App\Filament\Resources\AtasanPejabatResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAtasanPejabat extends CreateRecord
{
    protected static string $resource = AtasanPejabatResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
