<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $attributes = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string', 'min:6'],
        ]);

        if (!$token = auth()->attempt($attributes)) {
            return response()->json(['error' => 'Unauthorized']);
        }

        return response()->json([
            'status' => 200,
            'token' => $token
        ]);
    }

    public function logout()
    {
        auth()->logout();
        $removeToken = JWTAuth::invalidate(JWTAuth::getToken());

        if ($removeToken) {

            return response()->json([
                'message' => 'Logout Berhasil!',
            ]);
        }
    }
}
