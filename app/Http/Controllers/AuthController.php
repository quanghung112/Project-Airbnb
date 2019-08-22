<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (!($token = JWTAuth::attempt($credentials))) {
            return response()->json([
                'message' => 'Mat khau or email khong dung'
            ]);
        }
        $userid = Auth::user()->id;
        return response()->json(['token' => $token,
                                  'idUser' => $userid], Response::HTTP_OK);
    }

    public function logout(Request $request)
    {
        try {
            JWTAuth::invalidate($request->input('token'));
            return response()->json('You have successfully logged out.');
        } catch (JWTException $e) {
            return response()->json('Failed to logout, please try again.');
        }
    }
}
