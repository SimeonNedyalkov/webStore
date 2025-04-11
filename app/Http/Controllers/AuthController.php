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
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // If validation fails, return errors
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $data=$request->validated();
        if(Auth::attempt($data)){
            return response([
                'message'=>'Email or Password is incorrect'
            ]);
        }
        $user = Auth::user();
        $token = $user->createToken('main')->plainTextToken;
        return response()->json([
            'user'=>$user,
            'token'=>$token
        ]);
    }
    public function register(RegisterRequest $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // If validation fails, return errors
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $data=$request->validated();
        $user = User::create([
            "name"=>$data['name'],
            'email'=>$data["email"],
            "password"=>bcrypt($data['password'])
        ]);
        $token = $user->createToken('main')->plainTextToken;
        return response()->json([
            'user'=>$user,
            'token'=>$token
        ]);
    }

    public function logout(Request $request){
        $user =$request->user();
        $user->currentAuthToken()->delete();
        return response('',204);
    }
}