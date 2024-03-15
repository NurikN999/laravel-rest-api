<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        $user = User::create([
            'username' => $request->input('username'),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        $token = JWTAuth::fromUser($user);

        $cookie = cookie('jwt', $token, 60 * 24);

        return response()->json([
            'success' => true,
            'data' => [
                'token' => $token
            ]
        ])->withCookie($cookie);
    }

    public function login(Request $request)
    {
        if (! Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid credentials'
            ]);
        }

        $user = Auth::user();
        $token = JWTAuth::fromUser($user);

        $cookie = cookie('jwt', $token, 60 * 24);

        return response()->json([
            'success' => true,
            'data' => [
                'token' => $token
            ]
        ])->withCookie($cookie);
    }

}
