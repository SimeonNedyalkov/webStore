<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User as ModelsUser;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegister(){
        return view('api.register');
    }

    public function showLogin(){
        return view('api.login');
    }
    public function register(Request $request){
        $validated = $request->validate([
            'name'=>'required|string|max:30',
            "email"=>'required|email|unique:users',
            "password"=>'required|string|min:8|confirmed'
        ]);

       $user = ModelsUser::create();
        Auth::login($user);
    }
    public function login(){

    }
}
