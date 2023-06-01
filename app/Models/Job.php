<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;






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


}