<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register(Request $req){
        $req->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:6'
        ]);

        $user = User::create([
            'name'=>$req->name,
            'email'=>$req->email,
            'password'=>Hash::make($req->password),
        ]);

        return response()->json(['message'=>'Registered'], 201);
    }

    public function login(Request $req){
        $req->validate(['email'=>'required|email','password'=>'required']);
        $user = User::where('email',$req->email)->first();

        if(!$user || !Hash::check($req->password,$user->password)){
            throw ValidationException::withMessages(['email'=>['The provided credentials are incorrect.']]);
        }

        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json(['token'=>$token, 'user'=>$user]);
    }

    public function logout(Request $req){
        $req->user()->currentAccessToken()->delete();
        return response()->json(['message'=>'Logged out']);
    }

    public function me(Request $req){
        return $req->user();
    }
}
