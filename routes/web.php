<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('halaman-awal'); // ganti dengan tampilan custom kamu
});

Route::get('/cuti/{id}/print', [App\Http\Controllers\CutiPrintController::class, 'show'])
    ->name('cuti.print');
