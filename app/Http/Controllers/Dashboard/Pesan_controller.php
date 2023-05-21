<?php
 
namespace App\Http\Controllers\Dashboard;
 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
 
use App\Models\Models\Pesan;
use App\Models\Models\Profile_sekolah;
 
class Pesan_controller extends Controller
{
    public function index(){
        $title = 'My Pesan';
        $sk = Profile_sekolah::first();
 
        if(\Auth::user()->name == 'Admin'){
            $data = Pesan::orderBy('created_at','desc')->get();
        }else{
            $data = Pesan::where('users',\Auth::user()->id)->orderBy('created_at','desc')->get();
        }
        return view('dashboard.pesan.index',compact('title','data','sk'));
    }
 
    public function detail($id){
        $dt = Pesan::where('id',$id)->first();
        $title = 'Detail Pesan';
        $sk = Profile_sekolah::first();
 
        if(\Auth::user()->name == 'Admin'){
            Pesan::where('id',$id)->update([
                'status'=>1
            ]);
        }
 
        return view('dashboard.pesan.detail',compact('title','dt','sk'));
    }
 
    public function add(){
        $title = 'Menambah pesan';
        $sk = Profile_sekolah::first();
 
        return view('dashboard.pesan.add',compact('title','sk'));
    }
 
    public function store(Request $request){
        $this->validate($request,[
            'judul'=>'required',
            'keterangan'=>'required'
        ]);
 
        $data['judul'] = $request->judul;
        $data['keterangan'] = $request->keterangan;
        $data['users'] = \Auth::user()->id;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
 
        Pesan::insert($data);
 
        \Session::flash('sukses','Pesan berhasil dikirim');
        return redirect('pesan/add');
    }
}