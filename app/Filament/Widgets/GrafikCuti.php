<?php

namespace App\Filament\Widgets;

use App\Models\Cuti;
use Filament\Widgets\ChartWidget;

class GrafikCuti extends ChartWidget
{
    protected static ?string $heading = 'Grafik Pengajuan Cuti per Bulan';

    protected function getData(): array
    {
        $data = Cuti::selectRaw("MONTHNAME(tanggal_mulai) as bulan, COUNT(*) as jumlah")
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->pluck('jumlah', 'bulan');

        return [
            'datasets' => [
                [
                    'label' => 'Pengajuan',
                    'data' => $data->values(),
                    'backgroundColor' => '#3b82f6',
                ],
            ],
            'labels' => $data->keys()->map(fn($b) => date('F', mktime(0, 0, 0, $b, 1))),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
