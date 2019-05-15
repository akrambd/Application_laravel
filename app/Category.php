<?php

namespace App;


use App\Post;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = [
        'name'
    ];

    public function post(){

    return $this->hasOne('App\Post','category_id');


}

    public function posts(){

        return $this->hasMany('App\Post','category_id');


    }

}
