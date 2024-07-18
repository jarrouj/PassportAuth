<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgetController;
use App\Http\Controllers\ResetController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:api');

// {{ Login Routes }}
Route::post('/login' , [AuthController::class, 'login']);

// {{ Register Routes }}
Route::post('/register' , [AuthController::class, 'register']);


// {{ Forget Password Routes }}
Route::post('/forget-password' , [ForgetController::class, 'ForgetPassword']);


// {{ Reset Password Routes }}
Route::post('/reset-password' , [ResetController::class, 'ResetPassword']);


// {{ Current User Route }}
Route::post('/user' , [UserController::class, 'User']);
