<?php

namespace App\Support;

use App\Models\Cuti;
use Illuminate\Support\Collection;

class RekapCutiHelper
{
    public static function queryRekap(?int $tahun = null)
    {
        $tahun = $tahun ?? now()->year;

        return \App\Models\Cuti::query()
            ->with(['pegawai:id,nama,nip', 'typeCuti:id,nama,kode'])
            ->selectRaw(
                'MIN(cutis.id) as key_id, cutis.pegawai_id, cutis.type_cuti_id, strftime(\'%Y\', cutis.tanggal_mulai) as tahun, COUNT(*) as total_cuti, SUM(cutis.lama_cuti) as total_hari'
            )
            ->whereRaw('strftime(\'%Y\', cutis.tanggal_mulai) = ?', [$tahun])
            ->where('cutis.status', 'disetujui')
            ->groupBy('cutis.pegawai_id', 'cutis.type_cuti_id', 'tahun')
            ->orderBy('tahun', 'desc');
    }
}
