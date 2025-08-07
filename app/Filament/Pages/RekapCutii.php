<?php

namespace App\Filament\Pages;

use App\Models\Cuti;
use Filament\Tables;
use App\Models\Pegawai;
use App\Models\TypeCuti;
use Filament\Pages\Page;
use App\Support\RekapCutiHelper;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;


class RekapCutii extends Page implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected static ?string $navigationLabel = 'Rekap Cuti Pegawai';
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static string $view = 'filament.pages.rekap-cutii';

    protected function getTableQuery()
    {
        return RekapCutiHelper::queryRekap(); // Bisa tambahkan parameter tahun kalau mau dinamis
    }

    public function getTableRecordKey(\Illuminate\Database\Eloquent\Model $record): string
    {
        return (string) $record->key_id;
    }


    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('pegawai.nama')->label('Nama Pegawai')->searchable(),
            TextColumn::make('typeCuti.nama')->label('Jenis Cuti'),
            TextColumn::make('tahun')->label('Tahun'),
            TextColumn::make('total_cuti')->label('Jumlah Pengajuan')->badge()->color('success'),
            TextColumn::make('total_hari')->label('Total Hari Cuti')->badge()->color('primary'),
        ];
    }

    protected function getTableFilters(): array
    {
        return [
            SelectFilter::make('pegawai_id')
                ->label('Nama Pegawai')
                ->options(fn() => Pegawai::pluck('nama', 'id')->toArray()),

            SelectFilter::make('type_cuti_id')
                ->label('Jenis Cuti')
                ->options(fn() => TypeCuti::pluck('nama', 'id')->toArray()),
        ];
    }
}
