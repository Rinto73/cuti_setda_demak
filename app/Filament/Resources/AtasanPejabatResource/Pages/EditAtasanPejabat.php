<?php

namespace App\Filament\Resources\AtasanPejabatResource\Pages;

use App\Filament\Resources\AtasanPejabatResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAtasanPejabat extends EditRecord
{
    protected static string $resource = AtasanPejabatResource::class;

    protected function fillForm(): void
    {
        $pejabat = $this->record->pejabat;

        $this->form->fill([
            'pejabat_id' => $pejabat?->id,
            'jabatan' => $pejabat?->jabatan,
            'tanda_tangan' => $this->record->tanda_tangan,
        ]);
    }

    protected function getHeaderActions(): array
    {
        return [
            // Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
