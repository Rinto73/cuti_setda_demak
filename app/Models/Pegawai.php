<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Pegawai extends Model
{
    protected $guarded = [];

    public function relasiPersetujuan()
    {
        return $this->hasOne(AtasanPejabat::class);
    }

    public function sisaCutiTahunan()
    {
        return $this->hasMany(SisaCutiTahunan::class);
    }

    public function tandaTangan()
    {
        return $this->hasMany(AtasanPejabat::class, 'pegawai_id');
    }
    public function cuti()
    {
        return $this->hasMany(Cuti::class, 'pegawai_id');
    }

    protected function unitKerja(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => match ($value) {
                'umum' => 'Bagian Umum',
                'prokompim' => 'Bagian Prokompim',
                'organisasi' => 'Bagian Organisasi',
                'pemerintahan' => 'Bagian Pemerintahan',
                'kesra' => 'Bagian Kesra',
                'hukum' => 'Bagian Hukum',
                'admpem' => 'Bagian Adm. Pembangunan',
                'perek' => 'Bagian Perekonomian dan SDA',
                'pbj' => 'Bagian PBJ',
                'bkpsdm' => 'BKPSDM',
                default => $value, // Mengembalikan nilai asli jika tidak ada yang cocok
            },
        );
    }
}
