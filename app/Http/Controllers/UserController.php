<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    public function getMyUser(Request $request)
    {
        $array = ['error' => '', 'list' => []];
        $user = auth()->user();

        $users = User::all();

        $array['list'] = $users;


        return $array;
    }
}
