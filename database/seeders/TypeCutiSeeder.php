<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TypeCuti;

class TypeCutiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jenisCuti = [
            [
                'kode' => 'CT',
                'nama' => 'Cuti Tahunan',
                'maks_hari' => 12,
                'status_berlaku' => ['pns', 'pppk'],
                'butuh_dokumen' => false,
                'butuh_approval' => true,
                'deskripsi' => 'Diberikan kepada ASN untuk istirahat tahunan, maksimal 12 hari kerja per tahun.',
            ],
            [
                'kode' => 'CB',
                'nama' => 'Cuti Besar',
                'maks_hari' => 90,
                'status_berlaku' => ['pns'],
                'butuh_dokumen' => false,
                'butuh_approval' => true,
                'deskripsi' => 'Diberikan setiap 5 tahun sekali, maksimal 3 bulan. Hanya untuk PNS.',
            ],
            [
                'kode' => 'CS',
                'nama' => 'Cuti Sakit',
                'maks_hari' => null,
                'status_berlaku' => ['pns', 'pppk'],
                'butuh_dokumen' => true,
                'butuh_approval' => true,
                'deskripsi' => 'Memerlukan surat dokter sebagai dokumen pendukung.',
            ],
            [
                'kode' => 'CM',
                'nama' => 'Cuti Melahirkan',
                'maks_hari' => 90,
                'status_berlaku' => ['pns'],
                'butuh_dokumen' => true,
                'butuh_approval' => true,
                'deskripsi' => 'Diberikan kepada ASN perempuan yang melahirkan, maksimal 3 bulan.',
            ],
            [
                'kode' => 'CK',
                'nama' => 'Cuti Karena Alasan Penting',
                'maks_hari' => 30,
                'status_berlaku' => ['pns', 'pppk'],
                'butuh_dokumen' => true,
                'butuh_approval' => true,
                'deskripsi' => 'Misalnya keluarga meninggal, anggota keluarga sakit berat, Menikah, dll.',
            ],
            [
                'kode' => 'CTK',
                'nama' => 'Cuti di Luar Tanggungan Negara',
                'maks_hari' => null,
                'status_berlaku' => ['pns', 'pppk'],
                'butuh_dokumen' => true,
                'butuh_approval' => true,
                'deskripsi' => 'Diberikan hanya dalam kondisi khusus dan disetujui pejabat tinggi.',
            ],
        ];

        foreach ($jenisCuti as $cuti) {
            TypeCuti::create($cuti);
        }
    }
}
