<?php

namespace App\Support;

use App\Models\Pegawai;

class CutiFormHelpers
{
    public static function hydrateMultipleFields($state, callable $set, callable $get, array $fields)
    {
        if (! $state && $get('pegawai_id')) {
            $pegawai = Pegawai::find($get('pegawai_id'));
            if ($pegawai) {
                foreach ($fields as $field) {
                    $set($field, $pegawai->{$field} ?? null);
                }
            }
        }
    }
}
