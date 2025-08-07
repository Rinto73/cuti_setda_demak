<?php

namespace App\Support;

use App\Models\TypeCuti;
use Illuminate\Support\Carbon;
use App\Models\SisaCutiTahunan;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Validator;

class CutiValidator
{
    public static function maxCutiTahunN($pegawaiId): int
    {
        $tahun = Carbon::now()->year;
        return (int) DB::table('sisa_cuti_tahunans')
            ->where('pegawai_id', $pegawaiId)
            ->where('tahun', $tahun)
            ->value('sisa_hari') ?? 0;
    }

    public static function ruleLamaCuti(?int $pegawaiId, ?int $typeCutiId): \Closure
    {
        return function ($attribute, $value, $fail) use ($pegawaiId, $typeCutiId) {
            if (! $pegawaiId || ! $typeCutiId) {
                return $fail('Data pegawai atau jenis cuti belum lengkap.');
            }

            $type = TypeCuti::find($typeCutiId);
            if (! $type) {
                return $fail('Jenis cuti tidak ditemukan.');
            }

            if ($value <= 0) {
                return $fail('Lama cuti minimal adalah 1 hari.');
            }

            // Validasi cuti tahunan
            if ($type->kode === 'CT') {
                $tahun = Carbon::now()->year;
                $sisa = SisaCutiTahunan::where('pegawai_id', $pegawaiId)
                    ->where('tahun', $tahun)
                    ->value('sisa_hari') ?? 0;

                if ($value > $sisa) {
                    return $fail("Cuti tahunan melebihi sisa tahun $tahun: $sisa hari.");
                }
            }

            // Validasi jenis cuti lain
            elseif ($type->maks_hari && $value > $type->maks_hari) {
                return $fail("Cuti {$type->nama} maksimal {$type->maks_hari} hari.");
            }
        };
    }

    public static function helperText(?int $pegawaiId, ?int $typeCutiId): ?string
    {
        if (! $pegawaiId || ! $typeCutiId) {
            return null;
        }

        $type = TypeCuti::find($typeCutiId);
        if (! $type) {
            return null;
        }

        if ($type->kode === 'CT') {
            $tahun = Carbon::now()->year;
            $sisa = SisaCutiTahunan::where('pegawai_id', $pegawaiId)
                ->where('tahun', $tahun)
                ->value('sisa_hari') ?? 0;
            return "Sisa cuti tahunan tahun $tahun: $sisa hari";
        }

        if ($type->maks_hari) {
            return "Maksimal cuti untuk {$type->nama}: {$type->maks_hari} hari";
        }

        return null;
    }
}
