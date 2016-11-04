<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kuppi extends Model
{
    public static $rules = [
        'created_by' => 'required|exists:users,id',
        'subject' => 'required|max:255',
        'date' => 'required|date|after:today',
        'time' => 'required',
        'place' => 'required|max:255',
        'message' => 'string'
    ];

    public function createdBy(){
        return $this->hasOne('App\User');
    }
}
