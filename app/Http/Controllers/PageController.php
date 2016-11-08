<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PageController extends Controller
{
    public function getContact(){
        return view('pages.contact');
    }
    
    public function addValues(){
        EnvController::addValue('address', 'RESA University of Moratuwa');
        EnvController::addValue('tel', '0779988420');
        EnvController::addValue('name', 'D. G. Viran Malaka Dayasiri');
        dd("add values");
    }
}
