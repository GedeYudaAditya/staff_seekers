<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SigninController extends Controller
{
    //
    public function index()
    {
        return view('guest.pages.auth.signin',[
            'title' => 'Sign In',
            'active' => 'signin'
        ]);
    }
}
