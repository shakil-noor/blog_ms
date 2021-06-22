<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function subCategories(){
        return $this->hasMany(SubCategory::class,'category_id');
    }

    public function posts(){
        return $this->hasMany(Post::class,'category_id');
    }
}
