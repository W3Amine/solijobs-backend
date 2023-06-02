<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;


    protected $fillable = [
        'employer_id',
        'category_id',
        'location_id',
        'title',
        'description',
        'salary',
        'type',
        'is_active',
        'gender',
        'experience',
        'qualification',
        'address',
    ];

    public $timestamps = true;


    // the job belongs to one employer // get the job owner data
    public function employerProfile()
    {
        return $this->belongsTo(EmployerProfile::class, "employer_id");
    }



    // the job belongs to one category // get the category data 
    public function category()
    {
        return $this->belongsTo(Category::class);
    }



    // the job belongs to one location // get the location data 
    public function location()
    {
        return $this->belongsTo(Location::class);
    }




    // get the skills  data that belong to a job
    // get the  job skill  // the job has many skills
    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'job_skill');
    }



    // get the candidate profiles  data that saved this a job
    // get the  job savers   // the job has many candidate  that did save it
    public function savers_candidates()
    {
        return $this->belongsToMany(CandidateProfile::class, 'Saved_Jobs');
    }




    // get the candidate profiles  data that apply this  job
    // get the  job applicants   // the job has many apply applicant candidates
    public function applicants_candidates()
    {
        return $this->belongsToMany(CandidateProfile::class, 'Jobs_Applications');
    }





}