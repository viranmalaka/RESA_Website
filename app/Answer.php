<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    public static $rules = [
        'body' => 'required',
        'user_id' => 'required|exists:users,id',
        'question_id' => 'required|exists:questions,id'
    ];

    public function question(){
        return $this->belongsTo('App\Question');
    }

    public function user(){
        return $this->hasOne('App\User');
    }
}
