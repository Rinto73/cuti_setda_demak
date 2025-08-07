<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CutiPrintController extends Controller
{
    public function show($id)
    {
        $cuti = \App\Models\Cuti::with('pegawai', 'typeCuti')->findOrFail($id);
        $statusAsn = $cuti->pegawai->status_asn;

        // Tentukan view template berdasarkan status ASN
        $viewName = match ($statusAsn) {
            'pns' => 'cuti.printpns',
            'pppk' => 'cuti.printpppk',
            // default => 'surat.formulir-default',
        };

        return view($viewName, compact('cuti'));
    }
}
