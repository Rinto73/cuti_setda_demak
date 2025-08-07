<?php

namespace App\Filament\Resources\TypeCutiResource\Pages;

use App\Filament\Resources\TypeCutiResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTypeCuti extends CreateRecord
{
    protected static string $resource = TypeCutiResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
