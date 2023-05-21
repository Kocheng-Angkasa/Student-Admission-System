<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Models\Profile_sekolah;

class Awalan_controller extends Controller
{
    public function index(){
        $title = 'SD TADIKA MESRA';
        $sk = Profile_sekolah::first();
        return view('welcome',compact('title','sk'));
    }
}
