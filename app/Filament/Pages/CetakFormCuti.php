<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\Action;
use App\Models\Cuti;

class CetakFormCuti extends Page implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected static ?string $navigationLabel = 'Cetak Form Cuti';
    protected static ?string $title = 'Cetak Form Cuti';
    protected static string $view = 'filament.pages.cetak-form-cuti';
    protected static ?int $navigationSort = 100;
    protected static ?string $navigationIcon = 'heroicon-o-printer';
    protected static ?string $navigationGroup = 'Pengajuan Cuti';

    protected function getTableQuery()
    {
        return Cuti::query()
            ->where('status', 'disetujui') // Filter hanya cuti disetujui
            ->with('pegawai');
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('pegawai.nama')->label('Nama Pegawai')->searchable(),
            TextColumn::make('tanggal_mulai')->label('Mulai')->date(),
            TextColumn::make('tanggal_selesai')->label('Selesai')->date(),
            TextColumn::make('lama_cuti')->label('Lama Cuti'),
            TextColumn::make('typeCuti.nama')->label('Jenis Cuti'),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            Action::make('cetak')
                ->label('Cetak Formulir')
                ->url(fn($record) => route('cuti.print', $record->id))
                ->openUrlInNewTab()
                ->color('success')
                ->button()
                ->icon('heroicon-o-printer')
                ->visible(fn($record) => auth()->id() === $record->user_id),
        ];
    }
}
