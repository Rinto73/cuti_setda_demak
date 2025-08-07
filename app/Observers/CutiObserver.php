<?php

namespace App\Observers;

use Carbon\Carbon;
use App\Models\Cuti;
use App\Models\SisaCutiTahunan;

class CutiObserver
{
    /**
     * Handle the Cuti "created" event.
     */
    public function created(Cuti $cuti): void
    {
        //
    }

    /**
     * Handle the Cuti "updated" event.
     */
    public function updated(Cuti $cuti)
    {
        // Jalankan hanya saat status berubah ke disetujui
        if ($cuti->isDirty('status') && $cuti->status === 'disetujui') {
            // Pastikan ini adalah cuti tahunan
            $jenis = strtolower($cuti->typeCuti?->nama ?? '');

            if ($jenis === 'cuti tahunan') {
                $tahun = Carbon::parse($cuti->tanggal_mulai)->year;

                $sisa = SisaCutiTahunan::firstOrCreate([
                    'pegawai_id' => $cuti->pegawai_id,
                    'tahun' => $tahun,
                ]);

                // Hindari pengurangan ganda
                if (! $cuti->is_committed) {
                    $sisa->sisa_hari = max(0, $sisa->sisa_hari - $cuti->lama_cuti);
                    $sisa->save();

                    // Tandai cuti sudah dikurangkan
                    $cuti->is_committed = true;
                    $cuti->saveQuietly();
                }
            }
        }
    }

    /**
     * Handle the Cuti "deleted" event.
     */
    public function deleted(Cuti $cuti): void
    {
        //
    }

    /**
     * Handle the Cuti "restored" event.
     */
    public function restored(Cuti $cuti): void
    {
        //
    }

    /**
     * Handle the Cuti "force deleted" event.
     */
    public function forceDeleted(Cuti $cuti): void
    {
        //
    }
}
