<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Models\Profile_sekolah;
use App\Models\User;
 
class Ppdb_controller extends Controller
{
    public function index(){
        $title = 'PPDB Online';
        $sk = Profile_sekolah::first();
        return view('ppdb.index',compact('title','sk'));
    }
 
public function store(Request $request){
        $this->validate($request,[
            'nama'=>'required',
            'nisn'=>'required',
            'email'=>'required',
            'photo'=>'required',
            'password'=>'required'
        ]);
 
        $data['name'] = $request->nama;
        $data['nisn'] = $request->nisn;
        $data['email'] = $request->email;
        $data['password'] = bcrypt($request->password);
        $data['id_registrasi'] = 'REG-'.date('YmdHis');
 
        //cek poto
        $file = $request->file('photo');
        if($file){
            $file->move('uploads',$file->getClientOriginalName());
            $data['photo'] = 'uploads/'.$file->getClientOriginalName();
        }
 
        User::insert($data);
 
        \Session::flash('berhasil','Pendaftaran berhasil dilakukan');
 
        return redirect('ppdb');
    }
}