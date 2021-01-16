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

        $users = User::find($user);

        $array['list'] = $users;
        

        return $array;
    }

    public function update($id, Request $request)
    {
        $array = ['error' => ''];
      
        $user = auth()->user();

        $users = User::find($user);

            $item = User::find($id);
            if ($item) {
               
                $item->save();
            } else {
                $array['error'] = 'Item inexistente.';
                return $array;
            }
        
        return $array;
    }
}
