<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public static $rules = [
        'name' => 'required|max:255',
        'email' => 'required|email|max:255|unique:users',
        'title' => 'required|max:255',
        'body' => 'required|string'
    ];
    
    public function answer(){
        return $this->hasMany('App\Answer');
    }
    
    public function tags(){
        return $this->belongsToMany('App\Tag');
    }
}
