<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactMailController extends Controller
{
    public function contactMail()
    {
        return view('frontend.contact-mail');
    }
}
