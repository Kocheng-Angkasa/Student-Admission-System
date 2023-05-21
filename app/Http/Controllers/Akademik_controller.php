<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Models\Profile_sekolah;

class Akademik_controller extends Controller
{
    public function index(){
        $title = 'KALENDER AKADEMIK SD TADIKA MESRA ';
        $sk = Profile_sekolah::first();
        return view('akademik',compact('title','sk'));
    }
}
