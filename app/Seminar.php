<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seminar extends Model
{
    public function Comments(){
        return $this->hasMany('App\Comment');
    }

    public function Users(){
        return $this->belongsToMany('App\User');
    }
}
