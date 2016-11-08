<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;


class EnvController extends Controller
{
    public static function getValue($key){
        return DB::select('select value from myEnv where key = ?' , [$key])['value'];
    }

    public static function setValue($key, $value){
        DB::update('update myEnv set value = ? where key = ?', [$value, $key]);
    }

    public static function addValue($key, $value){
//        dd($key, $value);
        $a = DB::insert("insert into myEnv (myKey, myValue) values ('?','?')",[$key, $value]);
        dd($a);
    }
}
