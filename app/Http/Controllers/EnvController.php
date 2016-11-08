<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class EnvController extends Controller
{
    public static function addValue($key, $value){
        DB::table('myEnv')->insert(['myKey' => $key, 'myValue' => $value]);
    }

    public static function setValue($key, $value){
        DB::table('myEnv')->where('myKey', $key)->update(['myValue'=> $value]);
    }

    public static function getValue($key){
        return DB::table('myEnv')->where('myKey', $key)->value('myValue');
    }

    public static function seedKeys(){
        $keys = ['name', 'address', 'telephone', 'facebook_link'];

        foreach ($keys as $key){
            if (self::getValue($key) == null){
                DB::table('myEnv')->insert(['myKey' => $key, 'myValue' => '[default]']);
            }
        }
    }
}




class Keys{
    const Name = 'name';
    const Address = 'address';
    const Telephone = 'telephone';
    const Facebook = 'facebook_link';
}