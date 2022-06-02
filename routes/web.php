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
    Route::get('/user/settings',[App\Http\Controllers\HomeController::class, 'settings'])->name('user.settings');
    Route::post('/user/settings',[App\Http\Controllers\HomeController::class, 'update_settings'])->name('user.update_settings');
    Route::get('/user/settings/password',[App\Http\Controllers\HomeController::class, 'settings_password'])->name('user.settings_password');
    Route::post('/user/settings/password',[App\Http\Controllers\HomeController::class, 'update_settings_password'])->name('user.update_settings_password');

    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('admin', App\Http\Controllers\AdminController::class);
    Route::resource('masyarakat', App\Http\Controllers\MasyarakatController::class);
    Route::prefix('surat-keterangan')->group(function () {
        Route::resource('domisili', App\Http\Controllers\SuratKeterangan\DomisiliController::class);
        Route::get('domisili/{id}/pdf', [App\Http\Controllers\SuratKeterangan\DomisiliController::class, 'export_pdf'])->name('domisili.export_pdf');
        Route::get('domisili/{id}/edit-status', [App\Http\Controllers\SuratKeterangan\DomisiliController::class, 'edit_status'])->name('domisili.edit_status');
        Route::patch('domisili/{id}/update-status', [App\Http\Controllers\SuratKeterangan\DomisiliController::class, 'update_status'])->name('domisili.update_status');
        Route::get('domisili/{id}/bukti-registrasi', [App\Http\Controllers\SuratKeterangan\DomisiliController::class, 'bukti_registrasi'])->name('domisili.bukti_registrasi');
        Route::get('domisili/{id}/berkas', [App\Http\Controllers\SuratKeterangan\DomisiliController::class, 'berkas'])->name('domisili.berkas');
    });
});
