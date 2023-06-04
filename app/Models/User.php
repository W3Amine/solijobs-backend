<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\EmployerProfile;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phoneNumber',
        'role',
        'profileImage',
        'email_verified_at',
    ];


    // ROLES CONST THAT WILL BE AVAILABLE OVER THE WHOLE APP
    const ADMIN = 0;
    const MANAGER = 1;
    const CANDIDATE = 2;
    const EMPLOYER = 3;

    public $timestamps = true;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    // get the employerProfile data that belongs to this user
// get the employerProfile of this user :D
    public function employerProfile()
    {
        return $this->hasOne(EmployerProfile::class);
    }

    // get the candidate Profile data of this user :D
    public function candidateProfile()
    {
        return $this->hasOne(CandidateProfile::class);
    }


    // get all the blogs of this user
    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }



}