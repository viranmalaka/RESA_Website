<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public static $rules = [
        'name' => 'required|max:100'
    ];

    public function question(){
        return $this->belongsToMany('App\Question');
    }
}
