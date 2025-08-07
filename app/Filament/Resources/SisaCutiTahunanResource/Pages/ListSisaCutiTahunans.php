<?php

namespace App\Filament\Resources\SisaCutiTahunanResource\Pages;

use App\Filament\Resources\SisaCutiTahunanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSisaCutiTahunans extends ListRecords
{
    protected static string $resource = SisaCutiTahunanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
