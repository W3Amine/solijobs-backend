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



    // get the skills data of a CandidateProfile

    // $find = CandidateProfile::find(2);
    // $data = $find->skills;

    // return $data;


    // get the Candidates Profile  data of a skill

    // $find = Skill::find(10);
    // $data = $find->candidates;

    // return $data;




    // get the jobs   data of a skill

    // $find = Skill::find(10);
    // $data = $find->jobs;

    // return $data;





    // get the skills   data of a job

    // $find = Job::find(7);
    // $data = $find->skills;

    // return $data;


});