<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class RegistrasiController extends Controller
{
    public function index(){
        return view('registrasi');
    }
    public function registrasi(Request $request){
        $validatedData =$request->validate([
            'name'=>'required|max:255',
            // 'username'=>['required','min:3','unique:users'],
            'email'=>'required|email:dns|unique:users',
            'password'=>'required|min:3'
        ]);
        $validatedData['password']=Hash::make($validatedData['password']);
        User::create($validatedData);
        return redirect('/')->with('status', 'Blog Post Form Data Has Been inserted');
    }
}
