<?php

namespace App\Exports;

use App\Models\Pegawai;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class PegawaiTemplateExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return collect(); // Kosongkan, hanya untuk template
    }

    public function headings(): array
    {
        return [
            'nama',
            'nip',
            'jabatan',
            'unit_kerja',
            'masa_kerja',
            'status_asn'
        ];
    }
}
