<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seminar extends Model
{
    public static $rules =[
        'school' => 'required|max:255',
        'date' => 'required|date|before:tomorrow',
        'description' => 'required'
    ];
    
    public function Comments(){
        return $this->hasMany('App\Comment');
    }

    public function Users(){
        return $this->belongsToMany('App\User');
    }
}
