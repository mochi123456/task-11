<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\Santricontroller;
use App\http\Controllers\PegawaiController;
use App\http\Controllers\AnggotaController;

use App\Http\Controllers\PengarangController; 
use App\Http\Controllers\PenerbitController; 
use App\Http\Controllers\KategoriController; 
use App\Http\Controllers\BukuController;

use App\Http\Controllers\MahasantriController; 
use App\Http\Controllers\MatakuliahController; 
use App\Http\Controllers\JurusanController; 
use App\Http\Controllers\DosenController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('salam', function () {
    return ('Assalamu alaikum,Selamat Belajar Laravel PeTIK Jombang Angkatan ke III' );
});

//routing parameter
Route::get('pegawai/{nama}/{devisi}', function ($nama,$devisi) {
    return'Nama Pegawai :'.$nama.'<br/>Departemen :'.$devisi;
});

//routing view kondisi
Route::get('kabar', function () {
    return view('kondisi');
});

//routing view Santri
Route::get('santri', [santricontroller::class,'datasantri']);

//routing view Hello
Route::get('Hello', function () {
    return view('Hello',['name'=> 'Inaya']);
});

//routing view kondisi
Route::get('/Nilai', function () {
    return view('Nilai');
});


//routing view kondisi
Route::get('daftarNilai', function () {
    return view('daftarnilai');
});


//routing view kondisi
Route::get('/phpframwork', function () {
    return view('layouts.index');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//routing view kondisi
Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai.index');
Route::get('/pegawai/create', [PegawaiController::class, 'create'])->name('pegawai.create');
Route::post('/pegawai', [PegawaiController::class, 'store'])->name('pegawai.store');

//routing view kondisi
Route::get('/anggota', [AnggotaController::class, 'index'])->name('anggota.index');
Route::get('/anggota/create', [AnggotaController::class, 'create'])->name('anggota.create');
Route::post('/anggota', [AnggotaController::class, 'store'])->name('anggota.store');

//routing pengarang, penerbit, kategori, buku
Route::resource('pengarang', PengarangController::class); 
Route::resource('penerbit', PenerbitController::class); 
Route::resource('kategori', KategoriController::class); 
Route::resource('buku', BukuController::class);

Route::resource('mahasantri', MahasantriController::class); 
Route::resource('matakuliah', MatakuliahController::class); 
Route::resource('jurusan', JurusanController::class); 
Route::resource('dosen', DosenController::class);


Route::get('bukupdf',[BukuController::class, 'bukuPDF']);



