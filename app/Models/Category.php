<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Category extends Model
{
    use HasFactory;




    // the category BelongsTo one parent
    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'category_parent');
    }


    // the category has many children
    public function childCategories()
    {
        return $this->hasMany(Category::class, 'category_parent');
    }

    // the category has many candidates
    public function candidates()
    {
        return $this->hasMany(CandidateProfile::class);
    }


    // the category has many jobs
    public function jobs()
    {
        return $this->hasMany(Job::class);
    }


}