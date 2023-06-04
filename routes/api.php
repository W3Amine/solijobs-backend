<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\UserDataResource;
use App\Http\Controllers\API\v1\UserLogin;
use App\Http\Controllers\API\v1\UserLogout;
use App\Http\Controllers\API\v1\UserRegister;
use App\Http\Controllers\API\v1\profileImageController;
use App\Http\Controllers\API\v1\ChangePasswordController;
use App\Http\Controllers\API\v1\EmployerProfileController;

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
            return new UserDataResource($request->user());
        });

        Route::get('/EmployerProfile/GetEmployerData', [EmployerProfileController::class, 'GetAuthEmployerData']);
        Route::post('/EmployerProfile/SetEmployerData', [EmployerProfileController::class, 'SetAuthEmployerData']);


        Route::post('/logout', [UserLogout::class, 'logout']);

        // ROUTE used by FilePond to Upload profile image  #needs Authorization
        Route::post('/profileImage', [profileImageController::class, 'upload']);

        // ROUTE used to change the user Password # need auth:sanctum
        Route::post('/ChangePassword', [ChangePasswordController::class, 'index']);


    });



    Route::post('/login', [UserLogin::class, 'login']);
    Route::post('/register', [UserRegister::class, 'register']);


});