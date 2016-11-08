<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    public static $rule = [
        'name' => 'required|max:255',
        'subject' =>'required|max:255',
        'email' => 'required|email|max:255',
        'message'=> 'required'
    ];
}
