<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'description',
        'image',
    ];

    public $timestamps = true;



    // get the author user of this blog article
    // this blog belongs to one user 
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


}