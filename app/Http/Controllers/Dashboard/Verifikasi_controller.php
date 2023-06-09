<?php
 
namespace App\Http\Controllers\Dashboard;
 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
 
use App\Models\User;
use App\Models\Models\Profile_sekolah;
 
class Verifikasi_controller extends Controller
{
    public function index(){
        $title = 'Verifikasi Peserta';
        $sk = Profile_sekolah::first();
 
        return view('dashboard.verifikasi.index',compact('title','sk'));
    }
 
    public function verifikasi(Request $request){
        $this->validate($request,[
            'id_pendaftaran'=>'required'
        ]);
 
        $id = $request->id_pendaftaran;
 
        $cek = User::where('id_registrasi',$id)->count();
 
        if($cek > 0){
            User::where('id_registrasi',$id)->update(['is_verifikasi'=>1]);
            \Session::flash('sukses','Peserta berhasil di verifikasi');
        }else{
            \Session::flash('gagal','ID Pendaftaran tidak ditemukan');
        }
 
        return redirect()->back();
    }
}