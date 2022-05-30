<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $title = 'Beranda';
    return view('welcome',compact(['title']));
});

Auth::routes();


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('admin', App\Http\Controllers\AdminController::class);
    Route::resource('masyarakat', App\Http\Controllers\MasyarakatController::class);
    Route::prefix('surat-keterangan')->group(function () {
        Route::resource('domisili', App\Http\Controllers\SuratKeterangan\DomisiliController::class);
        Route::get('domisili/{id}/pdf', [App\Http\Controllers\SuratKeterangan\DomisiliController::class, 'export_pdf'])->name('domisili.export_pdf');
    });
});
