<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $requst)
    {
        try {
            if (Auth::attempt($requst->only('emial' , 'password'))) {

                $user  = Auth::user();
                $token = $user->createToken('app')->accessToken;

                return response([
                    'message' => 'Successfully Login',
                    'token' => $token,
                    'user' => $user
                ] , 200);
            }

        }catch(Exception $e) {
            return response([
                'message' => $e->getMessage()
            ] , 400);
        }
        return response([
            'message' => 'Invalid Email or Password'
        ], 401);
    }

    
}
