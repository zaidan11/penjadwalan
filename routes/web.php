<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CoassMhsController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\tahap1_olahfinishController;
use App\Http\Controllers\RegisterController;

use Symfony\Component\HttpKernel\DependencyInjection\RegisterControllerArgumentLocatorsPass;

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

Route::get('/dashboard', function () {
    return view('layouts.home');
});

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

//plah tahap 1
Route::get('/dashboard/olahmhs', [CoassMhsController::class, 'index']);
Route::post('/importmahasiswa', [CoassMhsController::class, 'mahasiswaimport'])->name('importmahasiswa');

Route::get('/dashboard/olahmhs/generate', [CoassMhsController::class, 'generate'])->name('generate');
Route::get('/dashboard/olahmhs/hapusjadwal', [CoassMhsController::class, 'hapustabel'])->name('hapus');
Route::get('/dashboard/olahmhs/lihatjadwal1', [CoassMhsController::class, 'lihatjadwal1'])->name('lihatjadwal1');

//olah tahap 2
Route::get('/dashboard/olahmhs2', [CoassMhsController::class, 'index2']);
Route::get('/dashboard/olahmhs2/generate2', [CoassMhsController::class, 'generate2'])->name('generate2');
Route::post('/importmahasiswa2', [CoassMhsController::class, 'mahasiswaimport2'])->name('importmahasiswa2');
Route::get('/dashboard/olahmhs2/hapusjadwal2', [CoassMhsController::class, 'hapustabel2'])->name('hapus2');
Route::get('/dashboard/olahmhs2/lihatjadwal2', [CoassMhsController::class, 'lihatjadwal2'])->name('lihatjadwal2');

//mahasiswa
Route::get('/dashboard/mahasiswa/lihatjadwal1', [MahasiswaController::class, 'index'])->name('lihatmhs1');
Route::get('/dashboard/mahasiswa/lihatjadwal2', [MahasiswaController::class, 'index2'])->name('lihatmhs2');
