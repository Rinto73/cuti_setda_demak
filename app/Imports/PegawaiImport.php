<?php

namespace App\Imports;

use App\Models\Pegawai;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Validators\Failure;
use Illuminate\Support\Facades\DB;


class PegawaiImport implements ToCollection, WithHeadingRow
{
    public $jumlahBerhasil = 0;
    public $jumlahGagal = 0;
    public $nipGagal = [];

    public function collection(Collection $rows)
    {
        $nipTersimpan = [];

        foreach ($rows as $row) {
            $nip = trim($row['nip']);

            // Validasi wajib isi
            if (!$row['nama'] || !$nip || !$row['jabatan'] || !$row['unit_kerja'] || !$row['status_asn']) {
                $this->jumlahGagal++;
                continue;
            }

            // Duplikat dalam file
            if (in_array($nip, $nipTersimpan)) {
                $this->jumlahGagal++;
                $this->nipGagal[] = $nip . ' (duplikat di file)';
                continue;
            }

            // Duplikat di database
            if (Pegawai::where('nip', $nip)->exists()) {
                $this->jumlahGagal++;
                $this->nipGagal[] = $nip . ' (sudah ada di DB)';
                continue;
            }

            Pegawai::create([
                'nama' => $row['nama'],
                'nip' => $nip,
                'jabatan' => $row['jabatan'],
                'unit_kerja' => $row['unit_kerja'],
                'masa_kerja' => $row['masa_kerja'] ?? '0 tahun',
                'status_asn' => strtolower($row['status_asn']),
            ]);

            $nipTersimpan[] = $nip;
            $this->jumlahBerhasil++;
        }
    }
}
