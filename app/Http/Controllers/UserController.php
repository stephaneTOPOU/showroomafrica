<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function user()
    {
        $professionels = User::all(); 
        return view('frontend.tg.professionnel', compact('professionels'));
    }
}
