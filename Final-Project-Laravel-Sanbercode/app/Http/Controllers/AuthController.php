<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(){
        return view('register');
    }

    public function welcome(Request $request){
        $namaDepan = $request->input('fname');
        $namaBelakang = $request->input('lname');

        return view('welcome',['namaDepan' =>$namaDepan, 'namaBelakang' =>$namaBelakang]);
    }
}
