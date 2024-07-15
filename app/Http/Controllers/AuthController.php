<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $requst)
    {
        try {
            if (Auth::attempt($requst->only('emial' , 'password'))) {
                
            }

        }catch(\Exception $e) {
            return response([
                'message' => $e->getMessage()
            ] , 400);
        }
    }
}
