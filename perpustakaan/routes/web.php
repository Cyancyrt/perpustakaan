<?php

use App\Models\Admin;
use App\Models\Siswa;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PinjamController;
use App\Http\Controllers\SubscriberController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [SiswaController::class, 'login'])->middleware(['guest:admin', 'guest:siswa'])->name('login');
Route::prefix('/admin')->group(function () {
    Route::middleware(['guest:admin', 'guest:siswa'])->group(function () {
        Route::get('/login', [AdminController::class, 'login'])
            ->name('admin.login');
        Route::post('/login', [AdminController::class, 'authenticate']);
    });
    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])
            ->name('admin.index');
        Route::get('/datasiswa', [AdminController::class, 'datasiswaindex'])
            ->name('datasiswa.datasiswa');
        Route::get('/datasiswa/tambah', [AdminController::class, 'datasiswacreate'])
            ->name('datasiswa.create');
        Route::post('/datasiswa/store', [AdminController::class, 'datasiswastore'])
            ->name('datasiswa.store');
        Route::get('/datasiswa/store/{id}', [AdminController::class, 'datasiswaedit'])
            ->name('datasiswa.edit');
        Route::post('datasiswa/update/{id}', [AdminController::class, 'datasiswaupdate'])
            ->name('datasiswa.update');
        Route::delete('/datasiswa/{id}/delete', [AdminController::class, 'datasiswadestroy'])
            ->name('datasiswa.destroy');
        Route::get('/databuku', [AdminController::class, 'databukuindex'])
            ->name('databuku.databuku');
        Route::get('/databuku/tambah', [AdminController::class, 'databukucreate'])
            ->name('databuku.create');
        Route::post('/databuku/store', [AdminController::class, 'databukustore'])
            ->name('databuku.store');
        Route::get('/databuku/{id}/store', [AdminController::class, 'databukuedit'])
            ->name('databuku.edit');
        Route::post('databuku/{id}update', [AdminController::class, 'databukuupdate'])
            ->name('databuku.update');
        Route::delete('/databuku/{id}/delete', [AdminController::class, 'databukudestroy'])
            ->name('databuku.destroy');
        Route::get('/pinjaman', [AdminController::class, 'confirm'])->name('pinjaman');
        Route::post('/pinjam/{id}/update', [AdminController::class, 'updateCon'])->name('updateCon');
        Route::get('/databuku/kategori', [AdminController::class, 'kategoriView'])->name('kategori');
        Route::get('/kategori/{kategori:slug}', [AdminController::class, 'kategori'])
            ->name('kategori.databuku');
    });
    Route::post('/logout', [AdminController::class, 'logout'])
        ->name('admin.logout');
});

Route::middleware(['guest:admin', 'guest:siswa'])->group(function () {
    Route::get('/login', [SiswaController::class, 'login'])
        ->name('siswa.login');
    Route::post('/login', [SiswaController::class, 'authenticate']);
    Route::get('/siswa-register', [SiswaController::class, 'create'])
        ->name('siswa.create');
    Route::post('/siswa-register', [SiswaController::class, 'store'])
        ->name('siswa.store');
    Route::get('forget/form', [SiswaController::class, 'forgotform'])->name('password.form');
    Route::post('forget/{email}/form', [SiswaController::class, 'forgotpost'])->name('password.post');
    Route::get('forget/pass/{nisn}', [SiswaController::class, 'passform'])->name('change.form');
    Route::post('forget/{nisn}/pass', [SiswaController::class, 'passPost'])->name('change.post');
});
Route::middleware(['auth:siswa'])->group(function () {
    Route::get('send-mail', [SubscriberController::class, 'index'])->name('subs');
    Route::get('/dashboard', [SiswaController::class, 'index'])->name('siswa.index');
    Route::post('/pinjam/{id}/buku', [PinjamController::class, 'index'])->name('pinjam');
    Route::get('/pinjam', [PinjamController::class, 'create'])->name('pinjam.view');
    Route::post('/return/{id}/buku', [PinjamController::class, 'return'])->name('return');
    Route::get('/databuku/kategori', [SiswaController::class, 'kategoriView'])->name('kategori');
    Route::get('/kategori/{kategori:slug}', [SiswaController::class, 'kategori'])->name('kategori.databuku');
    Route::get('/detail', [SiswaController::class, 'show'])->name('detail');
});
Route::post('/logout', [SiswaController::class, 'logout'])
    ->name('siswa.logout');
