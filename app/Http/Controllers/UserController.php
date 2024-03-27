<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function user()
    {
        $professionels = User::where('valide', 1); 
        return view('frontend.professionnel', compact('professionels'));
    }
}
