<?php

namespace App\Support;

class CutiFormCalculator
{
    /**
     * Hitung sisa cuti berdasarkan nilai awal dan lama cuti yang diminta.
     *
     * @param int|null $sisaAwal
     * @param int|null $lamaCuti
     * @return int
     */
    public static function calculateSisaCuti(?int $sisaAwal, ?int $lamaCuti): int
    {
        $sisa = max(0, ($sisaAwal ?? 0) - ($lamaCuti ?? 0));
        return $sisa;
    }
}
