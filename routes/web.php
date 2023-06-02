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



    // TEST USER CREATE
    // User::create([
    //     'name' => 'imarn',
    //     'email' => 'imran@imran.com',
    //     'password' => 'imran2000',
    //     'phoneNumber' => '0675845140',
    //     'role' => 0,

    // ]);

    // GET ALL USERS
    // return User::all();






    // TEST EmployerProfile CREATE
    // EmployerProfile::create([
    //     'user_id' => 9,
    //     'website' => 'imran.com',
    //     'about' => 'imran dddddddddddddddddddddddddddd',
    //     'facebook' => 'test',
    //     'twitter' => 'test',

    // ]);

    // GET ALL employers
    // return EmployerProfile::all();




    // TEST candidateProfile CREATE
    // CandidateProfile::create([
    //     'user_id' => 9,
    //     'category_id' => 1,
    //     'about' => 'imran dddddddddddddddddddddddddddd',
    //     'birthdate' => '2000/05/06',
    //     'cv' => 'test',
    //     'experience' => 'test',
    //     'qualification' => 'test',
    //     'address' => 'test',
    //     'gender' => 'male',

    // ]);

    // GET ALL candidates
    // return CandidateProfile::all();




    // TEST Blog CREATE
    // Blog::create([
    //     'user_id' => 9,
    //     'title' => 'blog imran title',
    //     'about' => 'imran dddddddddddddddddddddddddddd',
    //     'slug' => 'dfsdfsdfsdfsdf-dgdfg-dfgdfgdfg',
    //     'description' => 'test',
    //     'image' => 'test',
    // ]);

    // GET ALL Blogs
    // return Blog::all();



    // // TEST Category CREATE
    // Category::create([
    //     'name' => "9falafel",
    //     'slug' => 'dfsdfsdfsdfsdf-dgdfg-dfgdfgdfg',
    //     'category_parent' => 1,
    // ]);

    // // GET ALL Categories
    // return Category::all();




    // TEST Job CREATE
    // Job::create([
    //     'employer_id' => 5,
    //     'category_id' => 1,
    //     'location_id' => 9,
    //     'title' => 'Job imran title',
    //     'description' => 'testtesttesttesttesttesttesttesttesttesttest',
    //     'salary' => 999.99,
    //     'type' => 'freelance',
    //     'gender' => 'both',
    //     'experience' => '10 years',
    //     'qualification' => '1bac',
    //     'address' => 'address oujda lol xd',
    // ]);

    // GET ALL Jobs
    // return Job::all();




    // // TEST Location CREATE
    // Location::create([
    //     'country' => 'morocco',
    //     'city' => 'oujda',

    // ]);

    // // GET ALL Locations
    // return Location::all();






    // // TEST Skill CREATE
    // Skill::create([
    //     'title' => 'nodejs',
    //     'slug' => 'node-js',

    // ]);

    // // GET ALL Skills
    // return Skill::all();






});