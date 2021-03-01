<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
{
    public function edit()
    {
         
        $user=User::find(Auth::user()->id);
        return view('user.account',compact('user'));
    }

    
}
