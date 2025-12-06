<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JenisAgendaController;
use App\Http\Controllers\KategoriSuratController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\AgendaKegiatanController;
use App\Http\Controllers\UsersController;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('login');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| AUTHENTICATED ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | USER (All logged-in users)
    |--------------------------------------------------------------------------
    */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('agenda-kegiatan', [AgendaKegiatanController::class, 'index'])->name('agenda-kegiatan.index');
    Route::get('surat-masuk', [SuratMasukController::class, 'index'])->name('surat-masuk.index');
    Route::get('surat-keluar', [SuratKeluarController::class, 'index'])->name('surat-keluar.index');

    /*
    |--------------------------------------------------------------------------
    | ADMIN ONLY
    |--------------------------------------------------------------------------
    */
    Route::resource('users', UsersController::class)
        ->middleware('admin');

    /*
    |--------------------------------------------------------------------------
    | ADMIN + STAFF
    |--------------------------------------------------------------------------
    */
    Route::middleware('adminstaff')->group(function () {

        Route::get('agenda-kegiatan/create', [AgendaKegiatanController::class, 'create'])->name('agenda-kegiatan.create');
        Route::post('agenda-kegiatan', [AgendaKegiatanController::class, 'store'])->name('agenda-kegiatan.store');
        Route::get('agenda-kegiatan/{agenda_kegiatan}', [AgendaKegiatanController::class, 'show'])->name('agenda-kegiatan.show');
        Route::get('agenda-kegiatan/{agenda_kegiatan}/edit', [AgendaKegiatanController::class, 'edit'])->name('agenda-kegiatan.edit');
        Route::put('agenda-kegiatan/{agenda_kegiatan}', [AgendaKegiatanController::class, 'update'])->name('agenda-kegiatan.update');
        Route::delete('agenda-kegiatan/{agenda_kegiatan}', [AgendaKegiatanController::class, 'destroy'])->name('agenda-kegiatan.destroy');

        Route::resource('jenis-agenda', JenisAgendaController::class);

        Route::resource('kategori-surat', KategoriSuratController::class);

        Route::get('surat-masuk/create', [SuratMasukController::class, 'create'])->name('surat-masuk.create');
        Route::post('surat-masuk', [SuratMasukController::class, 'store'])->name('surat-masuk.store');
        Route::get('surat-masuk/{surat_masuk}', [SuratMasukController::class, 'show'])->name('surat-masuk.show');
        Route::get('surat-masuk/{surat_masuk}/edit', [SuratMasukController::class, 'edit'])->name('surat-masuk.edit');
        Route::put('surat-masuk/{surat_masuk}', [SuratMasukController::class, 'update'])->name('surat-masuk.update');
        Route::delete('surat-masuk/{surat_masuk}', [SuratMasukController::class, 'destroy'])->name('surat-masuk.destroy');


        Route::get('surat-keluar/create', [SuratKeluarController::class, 'create'])->name('surat-keluar.create');
        Route::post('surat-keluar', [SuratKeluarController::class, 'store'])->name('surat-keluar.store');
        Route::get('surat-keluar/{surat_keluar}', [SuratKeluarController::class, 'show'])->name('surat-keluar.show');
        Route::get('surat-keluar/{surat_keluar}/edit', [SuratKeluarController::class, 'edit'])->name('surat-keluar.edit');
        Route::put('surat-keluar/{surat_keluar}', [SuratKeluarController::class, 'update'])->name('surat-keluar.update');
        Route::delete('surat-keluar/{surat_keluar}', [SuratKeluarController::class, 'destroy'])->name('surat-keluar.destroy');
    });
});

/*
|--------------------------------------------------------------------------
| AUTH (Login / Register / Password)
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';
