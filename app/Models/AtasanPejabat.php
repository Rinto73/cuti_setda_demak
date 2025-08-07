<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AtasanPejabat extends Model
{
    protected $guarded = [];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'atasan_id');
    }
}
