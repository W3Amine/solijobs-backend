<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        'slug',
    ];

    public $timestamps = true;

    // get the Candidates Profile data that belong to a skill
    // get the skill candidates profile // the skill has many candidates
    public function candidates()
    {
        return $this->belongsToMany(CandidateProfile::class, 'candidate_skill');
    }




    // get the jobs  data that belong to a skill
    // get the skill jobs  // the skill has many jobs
    public function jobs()
    {
        return $this->belongsToMany(Job::class, 'job_skill');
    }




}