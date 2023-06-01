<?php

use App\Models\Job;
use App\Models\Blog;
use App\Models\User;
use App\Models\Skill;
use App\Models\Category;
use App\Models\Location;
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



    // // get the data of the  applicantes  to a job    

    // $find = Job::find(10);
    // $data = $find->applicants_candidates;

    // return $data;



    // get the data of the  jobs  that applied  by a candidate
    // get the applyed jobs of a candidate   

    // $find = CandidateProfile::find(1);
    // $data = $find->applied_jobs;

    // return $data;



    // // get the data of the  jobs  that saved  by a candidate
    // // get the saved jobs of a candidate   

    // $find = CandidateProfile::find(1);
    // $data = $find->saved_jobs;

    // return $data;



    // // get the data of the  savers  to a job    


    // $find = Job::find(10);
    // $data = $find->savers_candidates;

    // return $data;


    // // get the data of the  savers  to a job    







});