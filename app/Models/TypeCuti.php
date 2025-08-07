<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TypeCuti extends Model
{
    protected $guarded = [];

    protected $casts = [
        'status_berlaku' => 'array',
    ];

    public function cutis(): HasMany
    {
        return $this->hasMany(Cuti::class, 'type_cuti_id');
    }
}
