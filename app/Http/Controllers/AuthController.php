<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    
    public function login(LoginRequest $request){
        $request->validate([
            "email":"required|email",
            "password":'required'
        ])
        if(!Auth::attempt($request->only('email','password'))){
            return response()->json([
                "status"=>false,
                "message"=>"Invalid cridentials"
            ])
        }
        $user = Auth::user();
        $token = $user->createToken('auth')->plainTextToken
        return response()->json([
            "status"=>true,
            "message"=>"User logged in successfully",
            "token"=>$token
        ])
    }
    public function register(RegisterRequest $request){
        $data = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create($data)
        return response()->json([
            "status"=>true,
            "message"=>"User registered successfully"
        ])

        
    }

    public function logout(Request $request){
        $user =$request->user();
        
        return response()->json([
            "status"=>true,
            "message"=>"User prifle data",
            "user" =>$user
        ])
    }
    public function profile(Request $request){
        Auth::logout();
        return response()->json([
            "status"=>true,
            "message"=>"User logged out successfully",
        ])
    }
}