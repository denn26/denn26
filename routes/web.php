<?php

use App\Http\Controllers\BeritaController;
use App\Http\Livewire\Berita;
use App\Http\Livewire\Kelas;
use App\Http\Livewire\Mapel;
use App\Http\Livewire\Guru;
use App\Http\Livewire\Nilai;
use App\Http\Livewire\ProfileGuru;
use App\Http\Livewire\ProfileSiswa;
use App\Http\Livewire\Siswa;
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

Route::redirect('/', '/dashboard');


Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::middleware('admin')->group(function () {
        Route::get('berita', Berita::class)->name('berita');
        Route::get('kelas', Kelas::class)->name('kelas');
        Route::get('mapel', Mapel::class)->name('mapel');
        Route::get('guru', Guru::class)->name('guru');
        Route::get('siswa', Siswa::class)->name('siswa');

        Route::get('nilai', Nilai::class)->name('nilai')->withoutMiddleware('admin');
    });

    Route::middleware('role:siswa')->group(function () {
        Route::get('siswa-profile/{id}', ProfileSiswa::class)->name('siswa.profile');
    });

    Route::middleware('role:guru')->group(function () {
        Route::get('guru-profile/{id}', ProfileGuru::class)->name('guru.profile');
    });

    Route::get('/dashboard', function () {
        return view('dashboard', ['header' => 'Dashboard']);
    })->name('dashboard');
});
