<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pegawai;


class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pegawaiList = [
            [
                'nama' => 'Fauziah',
                'nip' => '197912011998011002',
                'jabatan' => 'Pegawai',
                'unit_kerja' => 'Bagian Umum',
                'masa_kerja' => '25 Tahun 3 Bulan',
                'status_asn' => 'pppk',
            ],
            [
                'nama' => 'Ahmad Fauzi',
                'nip' => '197812011998011001',
                'jabatan' => 'Pegawai',
                'unit_kerja' => 'Bagian Umum',
                'masa_kerja' => '25 Tahun 6 Bulan',
                'status_asn' => 'pns',
            ],
            [
                'nama' => 'Siti Maryam',
                'nip' => '197902022005012002',
                'jabatan' => 'Kepala Bagian',
                'unit_kerja' => 'Bagian Umum',
                'masa_kerja' => '20 Tahun 1 Bulan',
                'status_asn' => 'pns',
            ],
            [
                'nama' => 'Bambang Sutrisno',
                'nip' => '196305031990031003',
                'jabatan' => 'Sekretaris Daerah',
                'unit_kerja' => 'Bagian Umum',
                'masa_kerja' => '35 Tahun 5 Bulan',
                'status_asn' => 'pns',
            ],
            [
                'nama' => 'Rina Kusuma',
                'nip' => '197505061998022004',
                'jabatan' => 'Asisten Sekda',
                'unit_kerja' => 'Bagian Umum',
                'masa_kerja' => '27 Tahun 10 Bulan',
                'status_asn' => 'pns',
            ],
            [
                'nama' => 'Dwi Hartono',
                'nip' => '196012011985011005',
                'jabatan' => 'Bupati',
                'unit_kerja' => 'Bagian Umum',
                'masa_kerja' => '40 Tahun 11 Bulan',
                'status_asn' => 'pns',
            ],
            [
                'nama' => 'Lilis Suryani',
                'nip' => '197203071997032006',
                'jabatan' => 'Kepala BKPSDM',
                'unit_kerja' => 'BKPSDM',
                'masa_kerja' => '28 Tahun 2 Bulan',
                'status_asn' => 'pns',
            ],
        ];

        foreach ($pegawaiList as $data) {
            Pegawai::create($data);
        }
    }
}
