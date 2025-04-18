<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

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

       $user = User::create($validated);
        Auth::login($user);
        return redirect()->route('welcome');
    }
    public function login(Request $request){
        $validated = $request->validate([
            "email"=>'required|email',
            "password"=>'required|string'
        ]);

        if(Auth::attempt($validated)){
            $request->session()->regenerate();
            return redirect()->route('welcome');
        };
        throw ValidationException::withMessages([
            'credentials'=>"Incorrect Credentials"
        ]);
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('show.login');
    }
}
