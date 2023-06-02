<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'category_parent',
    ];

    public $timestamps = true;

    // the category BelongsTo one parent 
    // get the parent of a category
    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'category_parent');
    }


    // the category has many children 
    // get the children of a category
    public function childCategories()
    {
        return $this->hasMany(Category::class, 'category_parent');
    }

    // the category has many candidates
    // get the candidates that have a category
    public function candidates()
    {
        return $this->hasMany(CandidateProfile::class);
    }


    // the category has many jobs
    // get the jobs that belongs to this category 
    public function jobs()
    {
        return $this->hasMany(Job::class);
    }


}