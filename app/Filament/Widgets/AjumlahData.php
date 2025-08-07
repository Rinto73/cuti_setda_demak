<?php

namespace App\Filament\Widgets;

use App\Models\Cuti;
use App\Models\Pegawai;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class AjumlahData extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Jumlah Pegawai', Pegawai::count() . '  Orang')
                ->icon('heroicon-o-users')
                ->color('info')
                ->description('Jumlah Pegawai Terdaftar')
                ->descriptionIcon('heroicon-m-users'),
            Stat::make('Pengajuan Cuti', Cuti::count() . ' Pengajuan')
                ->icon('heroicon-o-document-text')
                ->color('warning')
                ->description('Jumlah Pengajuan Cuti Pegawai')
                ->descriptionIcon('heroicon-m-document-text'),
            Stat::make('Pengajuan Disetujui', Cuti::where('status', 'disetujui')->count() . ' Pengajuan')
                ->icon('heroicon-o-check-circle')
                ->color('success')
                ->description('Jumlah Pengajuan Disetujui')
                ->descriptionIcon('heroicon-m-check-circle'),
            Stat::make('Pengajuan Ditolak', Cuti::where('status', 'ditolak')->count() . ' Pengajuan')
                ->icon('heroicon-o-x-circle')
                ->color('danger')
                ->description('Jumlah Pengajuan Ditolak')
                ->descriptionIcon('heroicon-m-x-circle'),
        ];
    }
}
