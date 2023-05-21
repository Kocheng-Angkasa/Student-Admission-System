<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Models\Profile_sekolah;

class Fasilitas_controller extends Controller
{
    public function index(){
        $title = 'FASILITAS SD TADIKA MESRA ';
        $sk = Profile_sekolah::first();
        return view('fasilitasPage',compact('title','sk'));
    }
}
