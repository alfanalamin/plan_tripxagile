<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();
       
        // check authentication with valideted data
        if (!$user || ! Hash::check($request->password, $user->password)){
            throw ValidationException::withMessages([
                'email' => ['Kamu Salah Memasukkan Email atau Password'],
            ]);
        }

    //    return $user-> createToken('user login')->plainTextToken;
    return response()->json([
        'message' => 'Login Success',
        'token' => $user->createToken($request->email)->plainTextToken,
        'user' => $user
    ]);
    
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'Logout Success'
        ]);
    }

    public function me(Request $request)
    {
        // return $request->user();
        return response()->json([
            'message' => 'Success',
             'user' => (Auth::user())
        ]);
    }
}
