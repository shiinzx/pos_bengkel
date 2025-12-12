<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index(){
        $data['buku'] = Buku::get();
        return view('buku.index',$data);
    }
}
