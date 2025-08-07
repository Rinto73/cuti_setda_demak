<?php

namespace App\Filament\Widgets;

use App\Models\Pegawai;
use Filament\Widgets\Widget;
use App\Models\SisaCutiTahunan;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB; // Pastikan ini ada

class SisaCutiTahunanWidget extends Widget
{
    protected static string $view = 'filament.widgets.sisa-cuti-tahunan-widget';
    protected static bool $isLazy = false;
    public function render(): View
    {
        $pegawai = Pegawai::orderBy('unit_kerja')->paginate(5);
        $data = $pegawai->map(function ($pegawai) {
            $jatah = 12;
            $sisa = SisaCutiTahunan::where('pegawai_id', $pegawai->id)
                ->where('tahun', now()->year)
                ->value('sisa_hari') ?? 0;
            $dipakai = $jatah - $sisa;

            return [
                'nama' => $pegawai->nama,
                'dipakai' => $dipakai,
                'sisa' => $sisa,
                'persen' => round(($dipakai / $jatah) * 100),
            ];
        });

        return view('filament.widgets.sisa-cuti-tahunan-widget', [
            'data' => $data,
            'pegawai' => $pegawai,
        ]);
    }

    // public function getColumnSpan(): int|string|array
    // {
    //     return 'full';
    // }
}
