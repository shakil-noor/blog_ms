<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    public function category(){
        return $this->belongsTo(Category::class,'category_id');
     }
 
     public function postSubCategories(){
        return $this->hasMany(PostSubCategory::class,'post_id');
     }
}
