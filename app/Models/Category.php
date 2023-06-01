<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;





    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'category_parent');
    }

    public function childCategories()
    {
        return $this->hasMany(Category::class, 'category_parent');
    }



}