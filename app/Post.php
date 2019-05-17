<?php

namespace App;
use App\Category;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //


    protected $fillable = ['title','slug','content'];


    public function category(){

       return $this->belongsTo('App\Category');
//       return $this->belongsTo(Category::class);

    }
}
