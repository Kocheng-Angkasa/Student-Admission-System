<?php
 
namespace App\Http\Controllers\Dashboard;
 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Models\Profile_sekolah;
 
class Profile_sekolah_controller extends Controller
{
    public function index(){
        $title = 'Update Profile Sekolah';
        $dt = Profile_sekolah::first();
        $sk = Profile_sekolah::first();
 
        return view('dashboard.profile_sekolah.index',compact('title','dt','sk'));
    }
 
    public function update(Request $request){
        $this->validate($request,[
            'nama'=>'required',
            'alamat'=>'required',
            'no_telp'=>'required'
        ]);
 
        $dt = Profile_sekolah::first();
        $dt->nama = $request->nama;
        $dt->no_telp = $request->no_telp;
        $dt->alamat = $request->alamat;
        $dt->judul_fasilitas_1 = $request->judul_fasilitas_1;
        $dt->desc_fasilitas_1 = $request->desc_fasilitas_1;
        $dt->judul_fasilitas_2 = $request->judul_fasilitas_2;
        $dt->desc_fasilitas_2 = $request->desc_fasilitas_2;
        $dt->judul_fasilitas_3 = $request->judul_fasilitas_3;
        $dt->desc_fasilitas_3 = $request->desc_fasilitas_3;
        $dt->created_at = date('Y-m-d H:i:s');
        $dt->updated_at = date('Y-m-d H:i:s');
 
        $file = $request->file('photo');
        if($file){
            $nama_gambar = $file->getClientOriginalName();
            $file->move('sekolah_images',$nama_gambar);
 
            $dt->photo = 'sekolah_images/'.$nama_gambar;
        }

        $file = $request->file('akademik');
        if($file){
            $nama_pdf = $file->getClientOriginalName();
            $file->move('akademik_pdf',$nama_pdf);
 
            $dt->akademik = 'akademik_pdf/'.$nama_pdf;
        }

        $file = $request->file('pic_fasilitas_1');
        if($file){
            $nama_pdf = $file->getClientOriginalName();
            $file->move('fasilitas/fasilitas_1',$nama_pdf);
 
            $dt->pic_fasilitas_1 = 'fasilitas/fasilitas_1/'.$nama_pdf;
        }
        $file = $request->file('pic_fasilitas_2');
        if($file){
            $nama_pdf = $file->getClientOriginalName();
            $file->move('fasilitas/fasilitas_2',$nama_pdf);
 
            $dt->pic_fasilitas_2 = 'fasilitas/fasilitas_2/'.$nama_pdf;
        }
        $file = $request->file('pic_fasilitas_3');
        if($file){
            $nama_pdf = $file->getClientOriginalName();
            $file->move('fasilitas/fasilitas_3',$nama_pdf);
 
            $dt->pic_fasilitas_3 = 'fasilitas/fasilitas_3/'.$nama_pdf;
        }
 
        $dt->save();
 
        \Session::flash('sukses','Data berhasil di update');
 
        return redirect()->back();
    }
}