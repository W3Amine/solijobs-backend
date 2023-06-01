<?php

use App\Models\User;
use App\Models\Category;
use App\Models\EmployerProfile;
use App\Models\CandidateProfile;
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




    // $category = Category::find(5);
    // $categorycandidates = $category->candidates;
    // $categorycandidatesthenuser = $category->candidates->find(2)->user;


    // $Candidate = CandidateProfile::find(3);
    // $Candidateuser = $Candidate->user;

    // return $Candidateuser;



    $Candidate = CandidateProfile::find(3);
    $CandidatecategoryData = $Candidate->categoryData;

    return $CandidatecategoryData;



});