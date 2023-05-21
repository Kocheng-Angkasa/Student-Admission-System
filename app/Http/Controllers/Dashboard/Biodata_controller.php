<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Models\Biodata;
use App\Models\Models\Profile_sekolah;
use App\Models\User;
use PDF;

class Biodata_controller extends Controller
{
    public function index()
    {
        $title = 'Melengkapi Biodata';
        $dt = Biodata::where('users',\Auth::user()->id)->first();
        $cek = Biodata::where('users',\Auth::user()->id)->count();
        $sk = Profile_sekolah::first();

        return view('dashboard.biodata.index', compact('title', 'dt', 'cek','sk'));
    }

    public function store(Request $request, $id)
    {
        $this->validate($request, [
            'no_wa' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'akta' => 'required',
            'kk' => 'required'
        ]);
        $file = $request->file('kk');
        if ($file) {
            $nama_file = 'kk'.$file->getClientOriginalName();
            $file->move('biodata_files', $nama_file);
            $data['kk'] = 'biodata_files/' . $nama_file;
        }

        $file = $request->file('akta');
        if ($file) {
            $nama_file = 'akta'.$file->getClientOriginalName();
            $file->move('biodata_files', $nama_file);
            $data['akta'] = 'biodata_files/' . $nama_file;
        }
        $data['users'] = $id;
        $data['no_wa'] = $request->no_wa;
        $data['alamat'] = $request->alamat;
        $data['tempat_lahir'] = $request->tempat_lahir;
        $data['tanggal_lahir'] = $request->tanggal_lahir;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        Biodata::insert($data);

        \Session::flash('sukses', 'Data berhasil ditambah');
        return redirect()->back();
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'no_hp' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required'
        ]);
        $file = $request->file('kk');
        if ($file) {
            $nama_file = 'kk'.$file->getClientOriginalName();
            $file->move('biodata_files', $nama_file);
            $data['kk'] = 'biodata_files/' . $nama_file;
        }

        $file = $request->file('akta');
        if ($file) {
            $nama_file = 'akta'.$file->getClientOriginalName();
            $file->move('biodata_files', $nama_file);
            $data['akta'] = 'biodata_files/' . $nama_file;
        }
        // $data['users'] = $id;
        $data['no_wa'] = $request->no_wa;
        $data['alamat'] = $request->alamat;
        $data['tempat_lahir'] = $request->tempat_lahir;
        $data['tanggal_lahir'] = $request->tanggal_lahir;
        // $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        Biodata::where('users',$id)->update($data);

        \Session::flash('sukses', 'Data berhasil diupdate');

        return redirect()->back();
    }

    public function cetak()
    {
        try {
            $dt = User::where('id', \Auth::user()->id)->with('biodata_r')->first();
            $sk = Profile_sekolah::first();

            $pdf = PDF::loadview('dashboard.biodata.pdf', compact('dt', 'sk'))->setPaper('a3', 'potrait');
            return $pdf->stream();
        } catch (\Exception $e) {
            \Session::flash('gagal', $e->getMessage() . ' ! ' . $e->getLine());
        }

        return redirect()->back();
    }
}
