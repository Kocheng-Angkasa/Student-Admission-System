<?php

use App\Http\Controllers\Dashboard\PesertaController;
use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\Ppdb_controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Awalan_controller;
use App\Http\Controllers\Akademik_controller;
use App\Http\Controllers\Fasilitas_controller;
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

Route::get('create-admin',function(){
    \DB::table('users')->insert([
        'role'=>1,
        'name'=>'Admin',
        'nisn'=>'1',
        'email'=>'admin@ppdb.com',
        'id_registrasi'=>'-',
        'password'=>bcrypt('123')
    ]);
    \DB::table('profile_sekolah')->insert([
        'nama'=>'SD PURWOSARI 1',
        'alamat'=>'Purwosari, Kab. Bojonegoro, Prov. Jawa timur',
        'no_telp'=>'08080808',
        'photo'=>'sekolah_images/logo.jpg',
        'akademik'=>'akademik_pdf/keputusan-kepala-dinas-pendidikan.pdf',
        'judul_fasilitas_1'=>'Green House',
        'desc_fasilitas_1'=>'Green house adalah sebuah bangunan yang dibentuk untuk menghindari dan merawat tanaman terhadap berbagai macam cuaca. Di Green House ini, murid dapat belajar mencintai alam melalui perawatan tumbuhan',
        'pic_fasilitas_1'=>'fasilitas/fasilitas_1/FW_XLnSYX38-00-02-09.png',
        'judul_fasilitas_2'=>'Tempat Parkir yang Luas',
        'desc_fasilitas_2'=>'Sekolah kami memiliki tempat parkir yang cukup luas, sehingga dapat menampung banyak sepeda murid',
        'pic_fasilitas_2'=>'fasilitas/fasilitas_2/SJYHICMH26M-00-02-28.png',
        'judul_fasilitas_3'=>'Perpustakaan',
        'desc_fasilitas_3'=>'Perpustakaan di sekolah kami memiliki banyak buku, dari dalam negeri maupun luar negeri. Diharapkan dengan adanya perpustakaan ini, murid dapat memiliki minat literasi yang tinggi',
        'pic_fasilitas_3'=>'fasilitas/fasilitas_3/SJYHICMH26M-00-02-56.png',
    ]);
    return redirect('/');
});

 
Route::get('/', [Awalan_controller::class, 'index']);
Route::get('/Akademik', [Akademik_controller::class, 'index']);
Route::get('/FasilitasPage', [Fasilitas_controller::class, 'index']);

Route::get('keluar',function(){
    \Auth::logout();
    return redirect('/');
});
Route::get('/ppdb', [Ppdb_controller::class, 'index']);
Route::post('/ppdb', [Ppdb_controller::class, 'store']);
 
Route::group(['middleware'=>'auth'],function(){
 
    Route::get('/dashboard', [App\Http\Controllers\Dashboard\Beranda_controller::class, 'index']);
    
    Route::get('/biodata', [App\Http\Controllers\Dashboard\Biodata_controller::class, 'index']);
    Route::post('/biodata/{users}', [App\Http\Controllers\Dashboard\Biodata_controller::class, 'store']);
    // Route::post('/biodata/{users:nisn}', [App\Http\Controllers\Dashboard\Biodata_controller::class, 'update']);
    Route::get('cetak-biodata',[App\Http\Controllers\Dashboard\Biodata_controller::class, 'cetak']);
    Route::get('verifikasi',[App\Http\Controllers\Dashboard\Verifikasi_controller::class, 'index']);
    Route::post('verifikasi',[App\Http\Controllers\Dashboard\Verifikasi_controller::class, 'verifikasi']);
    Route::get('/peserta', [App\Http\Controllers\Dashboard\Peserta_controller::class, 'index']);
    Route::get('/peserta/verifikasi', [App\Http\Controllers\Dashboard\Peserta_controller::class, 'diverifikasi']);
    Route::get('/peserta/belum-verifikasi', [App\Http\Controllers\Dashboard\Peserta_controller::class, 'belumverifikasi']);
    Route::get('peserta/{id}',[App\Http\Controllers\Dashboard\Peserta_controller::class, 'edit']);
    Route::put('peserta/{id}',[App\Http\Controllers\Dashboard\Peserta_controller::class, 'update']);
    Route::delete('peserta/{id}',[App\Http\Controllers\Dashboard\Peserta_controller::class, 'delete']);
    Route::get('peserta/{id}/lulus',[App\Http\Controllers\Dashboard\Peserta_controller::class, 'lulus']);

    Route::get('profile-sekolah',[App\Http\Controllers\Dashboard\Profile_sekolah_controller::class, 'index']);
    Route::put('profile-sekolah',[App\Http\Controllers\Dashboard\Profile_sekolah_controller::class, 'update']);
    Route::get('pesan',[App\Http\Controllers\Dashboard\Pesan_controller::class, 'index']);
    Route::get('pesan/add',[App\Http\Controllers\Dashboard\Pesan_controller::class, 'add']);
    Route::post('pesan/add',[App\Http\Controllers\Dashboard\Pesan_controller::class, 'store']);
    Route::get('pesan/{id}',[App\Http\Controllers\Dashboard\Pesan_controller::class, 'detail']);
});
 
Auth::routes();
 
Route::get('/home',function(){
    return redirect('/dashboard');
});