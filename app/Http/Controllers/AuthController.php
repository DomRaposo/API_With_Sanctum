<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use App\Services\Apiresponse;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        //validate request
        $request->validate([
            'email'=> 'required|email',
            'password'=> 'required'

        ]);
        //login attempt
        $email = $request->email;
        $password = $request->password;
        $attempt = auth()->attempt([
            'email' => $email,
            'password' => $password
        ]);
        if(!$attempt){
            return Apiresponse::unauthorized();
        }
        // authenticate user
        $user = auth()->user();
        $token = $user->createToken($user->name)->plainTextToken;

        //return the acess token for the api requests
        return Apiresponse::success([
            'user' => $user -> name,
            'email' => $user -> email,
            'token' => $token
        ]);
    }
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return Apiresponse::success('Logout with Successes');
    }
}
