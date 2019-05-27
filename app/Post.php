<?php

namespace App;
use App\Category;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //


    protected $fillable = ['title','category_id','slug','content'];


    public function category(){

       return $this->belongsTo(Category::class);
//       return $this->belongsTo(Category::class);

    }
}
