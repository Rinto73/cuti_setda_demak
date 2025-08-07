<?php

namespace App\Support;

use App\Models\SisaCutiTahunan;

class CutiSnapshotHelper
{
    public static function hydrateSisaCutiFields($state, callable $set, callable $get)
    {
        if (! $state && $get('pegawai_id')) {
            $snapshot = self::getPegawaiCutiSnapshot($get('pegawai_id'));
            foreach (['sisa_cuti_n2', 'sisa_cuti_n1', 'sisa_cuti_n'] as $field) {
                $set($field, $snapshot[$field] ?? 0);
            }
        }
    }

    public static function getPegawaiCutiSnapshot(int $pegawaiId, int $targetYear = null): array
    {
        $year = $targetYear ?? now()->year;

        return [
            'sisa_cuti_n2' => SisaCutiTahunan::where('pegawai_id', $pegawaiId)->where('tahun', $year - 2)->value('sisa_hari') ?? 0,
            'sisa_cuti_n1' => SisaCutiTahunan::where('pegawai_id', $pegawaiId)->where('tahun', $year - 1)->value('sisa_hari') ?? 0,
            'sisa_cuti_n'  => SisaCutiTahunan::where('pegawai_id', $pegawaiId)->where('tahun', $year)->value('sisa_hari') ?? 0,
        ];
    }
}
