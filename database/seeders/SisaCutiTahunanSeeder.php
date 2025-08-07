<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use App\Models\SisaCutiTahunan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SisaCutiTahunanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tahunSekarang = now()->year; // misalnya 2025
        $rentangTahun = [$tahunSekarang - 2, $tahunSekarang - 1, $tahunSekarang];

        // Default sisa per tahun (bisa fleksibel)
        $templateSisa = [
            $tahunSekarang - 2 => 4,   // N-2
            $tahunSekarang - 1 => 6,   // N-1
            $tahunSekarang      => 12, // N
        ];

        $pegawaiList = Pegawai::all();

        foreach ($pegawaiList as $pegawai) {
            foreach ($rentangTahun as $tahun) {
                SisaCutiTahunan::updateOrCreate(
                    [
                        'pegawai_id' => $pegawai->id,
                        'tahun' => $tahun,
                    ],
                    [
                        'sisa_hari' => $templateSisa[$tahun] ?? 0,
                    ]
                );
            }
        }
    }
}
