<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function login(){
        // echo Hash::make("jowel8046");
        // die;
        return view('auth/login');
    }

    public function forgot(){
        return view('auth/forgot');
    }

    public function dashboard(){
        return view('dashboard');
    }

    public function SMSlogin(Request $request){
        // dd($request->all());
        if (Auth::attempt(['email'=>$request->email, 'password'=>$request->password], true)) {
            return redirect('panel/dashboard');
        }
        else{
            return redirect()->back()->with('error','enter your correct email and password');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect(url(''));
    }
}
