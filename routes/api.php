<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\UserDataResource;
use App\Http\Controllers\API\v1\UserLogin;
use App\Http\Controllers\API\v1\UserLogout;
use App\Http\Controllers\API\v1\UserRegister;
use App\Http\Controllers\API\v1\JobController;
use App\Http\Controllers\API\v1\CategoryController;
use App\Http\Controllers\API\v1\LocationController;
use App\Http\Controllers\API\v1\profileImageController;
use App\Http\Controllers\API\v1\ChangePasswordController;
use App\Http\Controllers\API\v1\EmployerProfileController;
use App\Http\Controllers\API\v1\CandidateProfileController;

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

        Route::get('/CandidateProfile/GetCandidateData', [CandidateProfileController::class, 'GetAuthCandidateData']);
        Route::post('/CandidateProfile/SetCandidateData', [CandidateProfileController::class, 'SetAuthCandidateData']);

        Route::post('/logout', [UserLogout::class, 'logout']);

        // ROUTE used by FilePond to Upload profile image  #needs Authorization
        Route::post('/profileImage', [profileImageController::class, 'upload']);

        // ROUTE used by FilePond to Upload profile image  #needs Authorization
        Route::post('/Candidate/UploadCv', [CandidateProfileController::class, 'UploadCv']);


        // ROUTE used to change the user Password # need auth:sanctum
        Route::post('/ChangePassword', [ChangePasswordController::class, 'index']);

        // Route::apiResource('/jobs', JobController::class);

        Route::prefix('/jobs')->group(function () {

            Route::post('/', [JobController::class, 'store']);
            Route::get('/EmployerJobs', [JobController::class, 'GetEmployerJobs']);
            Route::get('/GetUnactiveJobs', [JobController::class, 'GetUnactiveJobs']);
            Route::get('/GetActiveJobs', [JobController::class, 'GetActiveJobs']);
            Route::get('/GetAppliedJobs', [JobController::class, 'GetAppliedJobs']);
            Route::get('/GetSavedJobs', [JobController::class, 'GetSavedJobs']);

        });

    });



    Route::post('/login', [UserLogin::class, 'login']);
    Route::post('/register', [UserRegister::class, 'register']);


    Route::apiResource('/categories', CategoryController::class);


    Route::prefix('locations')->group(function () {

        Route::get('/countries', [LocationController::class, 'Countries']);

        Route::get('/{country}/cities', [LocationController::class, 'ContryCities']);
    });

});