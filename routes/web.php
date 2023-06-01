<?php

use App\Models\User;
use App\Models\EmployerProfile;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::get('/test', function () {


    // $user = User::find(4);
    // $profile = $user->employerProfile; // Retrieve the user's profile

    // $profile = EmployerProfile::find(3);
    // $user = $profile->user; // Retrieve the user associated with the profile



    return $user;

});