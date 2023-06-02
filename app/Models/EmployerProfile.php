<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployerProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'website',
        'about',
        'facebook',
        'twitter',
    ];

    public $timestamps = true;


    // get the user data of this employer
// this employer belongs to a one user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // get all the jobs data of this Employer Profile
    public function jobs()
    {
        return $this->hasMany(Job::class, "employer_id");
    }


}