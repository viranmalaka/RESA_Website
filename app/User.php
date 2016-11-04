<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'address', 'field', 'tel', 'gender', 'school', 'level',
        'about', 'p_pic', 'facebook_link', 'linkedin_link', 'twitter_link', 'instagram_link', 'access', 'image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static $rules = [
        'name' => 'required|max:255',
        'email' => 'required|email|max:255|unique:users',
        'password' => 'required|min:6|confirmed',
        
        'address' => 'required|max:255',
        'field' => 'required|in:CHE,CSE,EM,CIVIL,EE,ENTC,MAT,TM,TLM,MEC,MPR',
        'telephone' => 'required|max:13|min:10',
        'gender' => 'required|boolean',
        'school' => 'required|max:255',
        'level' => 'required|min:0|max:5',
        'about' => 'string',
        'p_pic' => 'file|image',
        'facebook_link' => 'url',
        'linkedin_link' => 'url',
        'twitter_link' => 'url',
        'instagram_link' => 'url',
    ]; 

    public function seminar_Participate(){
        return $this->belongsToMany('App\Seminar');
    }
    
    public function answer(){
        return $this->belongsTo('App\Answer');
    }

    public function createKuppi(){
        return $this->belongsTo('App\Kuppi');
    }
}
