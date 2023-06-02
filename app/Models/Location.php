<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'country',
        'city',
    ];

    public $timestamps = true;


    // the Location has many jobs
    // get all the jobs of a category
    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

}