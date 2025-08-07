<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{

    protected $guarded = [];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'pegawai_id');
    }

    public function typeCuti()
    {
        return $this->belongsTo(TypeCuti::class, 'type_cuti_id');
    }

    protected $appends = ['total_cuti', 'total_hari', 'tahun', 'key_id'];

    public function getTotalCutiAttribute()
    {
        return $this->attributes['total_cuti'] ?? null;
    }
    public function getTotalHariAttribute()
    {
        return $this->attributes['total_hari'] ?? null;
    }
    public function getTahunAttribute()
    {
        return $this->attributes['tahun'] ?? null;
    }
    public function getKeyIdAttribute()
    {
        return $this->attributes['key_id'] ?? null;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getSisaN2Attribute()
    {
        $tahun = date('Y') - 2;
        return \App\Models\SisaCutiTahunan::where('pegawai_id', $this->pegawai_id)
            ->where('tahun', $tahun)
            ->value('sisa_hari');
    }

    public function getSisaN1Attribute()
    {
        $tahun = date('Y') - 1;
        return \App\Models\SisaCutiTahunan::where('pegawai_id', $this->pegawai_id)
            ->where('tahun', $tahun)
            ->value('sisa_hari');
    }

    public function getSisaNAttribute()
    {
        $tahun = date('Y');
        return \App\Models\SisaCutiTahunan::where('pegawai_id', $this->pegawai_id)
            ->where('tahun', $tahun)
            ->value('sisa_hari');
    }

    public function atasan()
    {
        return $this->belongsTo(Pegawai::class, 'atasan_id');
    }

    public function pejabat()
    {
        return $this->belongsTo(Pegawai::class, 'pejabat_id');
    }
}
