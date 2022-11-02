<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestController extends Controller
{
    //
    public function index()
    {
        return view('guest.pages.index', [
            'title' => 'Home',
            'active' => 'home'
        ]);
    }

    public function inactive()
    {
        return view('guest.pages.inactive', [
            'title' => 'Home',
            'active' => 'inactive'
        ]);
    }
}
