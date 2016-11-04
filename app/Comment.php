<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function Seminar(){
        return $this->belongsTo('App\Seminar');
    }
}
