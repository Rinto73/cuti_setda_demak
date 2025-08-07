<?php

namespace App\Filament\Resources\PegawaiResource\Pages;

use Filament\Actions;
use App\Imports\PegawaiImport;
use Filament\Pages\Actions\Action;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PegawaiTemplateExport;
use Illuminate\Support\Facades\Storage;
use Filament\Notifications\Notification;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\PegawaiResource;


class ListPegawais extends ListRecords
{
    protected static string $resource = PegawaiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Action::make('Unduh Template')
                ->icon('heroicon-o-arrow-down-tray')
                ->action(fn() => Excel::download(new PegawaiTemplateExport, 'template_pegawai.xlsx'))
                ->requiresConfirmation()
                ->color('success'),

            Action::make('Import Pegawai')
                ->icon('heroicon-o-arrow-up-tray')
                ->form([
                    FileUpload::make('file')
                        ->label('File Excel (.xlsx)')
                        ->required()
                        ->acceptedFileTypes(['application/vnd.openxmlformats-officedocument.spreadsheetml.sheet']),
                ])
                ->action(function (array $data) {
                    // 👇 Letakkan di sini!
                    $filePath = Storage::disk('public')->path($data['file']);
                    $importer = new PegawaiImport;
                    Excel::import($importer, $filePath);

                    if ($importer->jumlahBerhasil > 0 && $importer->jumlahGagal === 0) {
                        // Semua berhasil
                        Notification::make()
                            ->title("Import berhasil: {$importer->jumlahBerhasil} pegawai")
                            ->success()
                            ->send();
                    } elseif ($importer->jumlahBerhasil > 0 && $importer->jumlahGagal > 0) {
                        // Sebagian gagal
                        Notification::make()
                            ->title("Sebagian berhasil: {$importer->jumlahBerhasil} masuk, {$importer->jumlahGagal} gagal")
                            ->body("Contoh gagal: " . implode(', ', array_slice($importer->nipGagal, 0, 3)))
                            ->warning()
                            ->send();
                    } else {
                        // Semua gagal
                        Notification::make()
                            ->title('Import gagal: tidak ada baris valid')
                            ->body("Contoh NIP bermasalah: " . implode(', ', array_slice($importer->nipGagal, 0, 3)))
                            ->danger()
                            ->send();
                    }
                })
                ->color('primary'),
        ];
    }
}
