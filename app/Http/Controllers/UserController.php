<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function getMyUser(Request $request){
        $array = ['error' => '', 'list' => []];
        
           return $array;
    }
}
