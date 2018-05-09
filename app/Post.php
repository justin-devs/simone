<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function genre(){
        return $this->belongsTo('App\Genre');
    }
    public function tags(){
        return $this->belongsToMany('App\Tag');
    }
}
