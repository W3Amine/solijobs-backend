<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\v1\UserLogin;
use App\Http\Controllers\API\v1\UserLogout;
use App\Http\Controllers\API\v1\UserRegister;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/






Route::prefix('v1')->group(function () {

    Route::middleware('auth:sanctum')->group(function () {

        Route::get('/user', function (Request $request) {
            return $request->user();
        });

        Route::post('/logout', [UserLogout::class, 'logout']);


    });



    Route::post('/login', [UserLogin::class, 'login']);
    Route::post('/register', [UserRegister::class, 'register']);

});