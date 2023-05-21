<?php
 
namespace App\Http\Controllers\Dashboard;
 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
 
use App\Models\User;
use App\Models\Models\Biodata;
use App\Models\Models\Profile_sekolah;
 
class Peserta_controller extends Controller
{
    public function index(){
        $title = 'Data peserta';
        $data = User::withCount('biodata_r')->whereNull('role')->orderBy('name','asc')->get();
        $sk = Profile_sekolah::first();
 
        return view('dashboard.peserta.index',compact('title','data','sk'));
    }
 
    public function diverifikasi(){
        $title = 'Data peserta yang sudah di verifikasi';
        $data = User::withCount('biodata_r')->whereNull('role')->where('is_verifikasi',1)->orderBy('name','asc')->get();
        $sk = Profile_sekolah::first();
        return view('dashboard.peserta.index',compact('title','data','sk'));
    }
 
    public function belumverifikasi(){
        $title = 'Data peserta yang belum di verifikasi';
        $data = User::withCount('biodata_r')->whereNull('role')->whereNull('is_verifikasi')->orderBy('name','asc')->get();
        $sk = Profile_sekolah::first();
        return view('dashboard.peserta.index',compact('title','data','sk'));
    }
 
    public function edit($id){
        $title = 'Edit Data peserta';
        $dt = User::with('biodata_r')->find($id);
        $sk = Profile_sekolah::first();
        return view('dashboard.peserta.edit',compact('title','dt','sk'));
    }
 
    public function update(Request $request,$id){
        try {
            // update data kedalam table users
            $user['email'] = $request->email;
            $user['name'] = $request->name;
            $user['nisn'] = $request->nisn;
            $user['updated_at'] = date('Y-m-d H:i:s');
 
            $file = $request->file('photo');
            if($file){
                $nama_file = $file->getClientOriginalName();
                $file->move('uploads',$nama_file);
                $user['photo'] = 'uploads/'.$nama_file;
            }
 
            User::where('id',$id)->update($user);
 
            // update data kedalam table biodata
            $biodata['no_wa'] = $request->no_wa;
            $biodata['alamat'] = $request->alamat;
            $biodata['tempat_lahir'] = $request->tempat_lahir;
            $biodata['tanggal_lahir'] = $request->tanggal_lahir;
            $biodata['updated_at'] = date('Y-m-d H:i:s');
 
            $file = $request->file('akta');
            if($file){
                $nama_file = $file->getClientOriginalName();
                $file->move('biodata_files',$nama_file);
                $biodata['akta'] = 'biodata_files/'.$nama_file;
            }
 
            $file = $request->file('kk');
            if($file){
                $nama_file = $file->getClientOriginalName();
                $file->move('biodata_files',$nama_file);
                $biodata['kk'] = 'biodata_files/'.$nama_file;
            }
 
            Biodata::where('users',$id)->update($biodata);
 
            \Session::flash('sukses','Data peserta berhasil di update');
 
        } catch (\Exception $e) {
            \Session::flash('gagal',$e->getMessage());
        }
 
        return redirect()->back();
    }
 
    public function delete($id){
        try {
            User::where('id',$id)->delete();
 
            \Session::flash('sukses','Data berhasil dihapus');
        } catch (\Exception $e) {
            \Session::flash('gagal',$e->getMessage());
        }
        return redirect()->back();
    }
 
    public function lulus($id){
        try {
            User::where('id',$id)->update([
                'is_lulus'=>1
            ]);
 
            \Session::flash('sukses','Peserta berhasil di luluskan');
        } catch (\Exception $e) {
            \Session::flash('gagal',$e->getMessage());
        }
 
        return redirect('peserta');
    }
}