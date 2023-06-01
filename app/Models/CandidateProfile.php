<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CandidateProfile extends Model
{
    use HasFactory;






    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categoryData()
    {
        return $this->belongsTo(Category::class, 'category_id');

    }



    // get the skills data that belong to a candidate
    // get the skills of  candidates profile // the skillcandidates has many skills 
    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'candidate_skill');
    }





    // get the saved_jobs data that belong to a candidate
    // get the saved_jobs of  candidates profile // the candidate has many saved_jobs 
    public function saved_jobs()
    {
        return $this->belongsToMany(Job::class, 'Saved_Jobs');
    }



    // get the applied_jobs data that belong to a candidate
    // get the applied_jobs of  candidates profile // the candidate has many applied_jobs 
    public function applied_jobs()
    {
        return $this->belongsToMany(Job::class, 'Jobs_Applications');
    }







}