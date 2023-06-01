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



}