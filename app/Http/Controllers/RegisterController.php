<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{

    public function index()
    {
        
        return view("/register");
    }

    public function store(Request $request){
        
        
        $validateddata=$request->validate([
            'nama_user' => 'required|max:255|alpha',
            'email_user'=> 'required|email:dns|unique:users',
            'asal_instansi'=>'required',
            'no_telp'=>'required',
            'password'=>'required|min:8|max:20'
        ]);
        

       User::create($validateddata);

       return redirect('/login');
    }
}
