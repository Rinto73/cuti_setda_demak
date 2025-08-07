<?php

namespace App\Filament\Resources\AtasanPejabatResource\Pages;

use App\Filament\Resources\AtasanPejabatResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAtasanPejabats extends ListRecords
{
    protected static string $resource = AtasanPejabatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
