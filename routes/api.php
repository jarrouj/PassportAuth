<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgetController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:api');

// {{ Login Routes }}
Route::post('/login' , [AuthController::class, 'login']);

// {{ Register Routes }}
Route::post('/register' , [AuthController::class, 'register']);


// {{ Forget Password Routes }}
Route::post('/forget-password' , [ForgetController::class, 'ForgetPassword']);
