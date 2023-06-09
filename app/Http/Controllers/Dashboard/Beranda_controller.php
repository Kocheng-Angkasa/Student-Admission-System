<?php
 
namespace App\Http\Controllers\Dashboard;
 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
 
use App\Models\Models\Biodata;
use App\Models\User;
use App\Models\Models\Profile_sekolah;
 
class Beranda_controller extends Controller
{
    public function index(){
        $title = 'Halaman Dashboard';
        $sk = Profile_sekolah::first();
 
        $user_id = \Auth::user()->id;
 
        $cek = Biodata::where('users',$user_id)->count();
        if($cek < 1){
            $pesan = 'Harap Melengkapi Biodata Terlebih Dahulu';
        }else{
            $pesan = 'Biodata Anda Sudah Dilengkapi Terima Kasih';
        }

        $cek_verifikasi = User::find($user_id);
 
        if($cek_verifikasi->is_verifikasi == 1){
            $status = 'Status Sudah Di verifikasi';
        }else{
            $status = 'Belum Diverifikasi';
        }

        $cek_lulus = User::find($user_id);
        if($cek_lulus->is_lulus == 1){
            $pesan_lulus = 'Selamat Anda Lulus';
        }else{
            $pesan_lulus = 'Mohon Maaf status anda masih dalam peninjauan';
        }

        return view('dashboard.beranda.index',compact('title','pesan','cek','status','pesan_lulus','sk'));
    }
}