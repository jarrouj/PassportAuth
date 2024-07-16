<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    public function login(Request $requst)
    {
        try {
            if (Auth::attempt($requst->only('email' , 'password'))) {

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

    public function register(RegisterRequest $request)
    {
        try {

            $user = User::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'password' =>  Hash::make($request->password),
            ]);
            $token = $user->createToken('app')->accessToken;

            return response([
                'message' => 'Successfully Registered',
                'token' => $token,
                'user' => $user
            ] , 200);


        }catch(Exception $e) {
            return response([
                'message' => $e->getMessage()
            ] , 400);
        }
    }

}
