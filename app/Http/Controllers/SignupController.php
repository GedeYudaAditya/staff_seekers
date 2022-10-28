<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SignupController extends Controller
{
    //
    public function index()
    {
        return view('guest.pages.auth.signup',[
            'title' => 'Sign Up',
            'active' => 'signup'
        ]);
    }
}
