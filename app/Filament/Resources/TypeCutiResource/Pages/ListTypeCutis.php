<?php

namespace App\Filament\Resources\TypeCutiResource\Pages;

use App\Filament\Resources\TypeCutiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTypeCutis extends ListRecords
{
    protected static string $resource = TypeCutiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
