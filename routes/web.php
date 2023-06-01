<?php

use App\Models\Job;
use App\Models\Blog;
use App\Models\User;
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



    // get jobs of an employyer
    // $Employer = EmployerProfile::find(7);
    // $EmployerJobs = $Employer->jobs;

    // return $EmployerJobs;



    // // get jobs of a category
    // $category = Category::find(11);
    // $categoryJobs = $category->jobs;

    // return $categoryJobs;


    // get jobs of a location
    // $location = Location::find(85);
    // $locationJobs = $location->jobs;

    // return $locationJobs;



    // get the location data of a job
    // $job = Job::find(13);
    // $data = $job->location;

    // return $data;



    // get the category data of a job

    // $job = Job::find(13);
    // $data = $job->category;

    // return $data;



    // get the employerProfile data of a job

    // $job = Job::find(13);
    // $data = $job->employerProfile->user;

    // return $data;



});