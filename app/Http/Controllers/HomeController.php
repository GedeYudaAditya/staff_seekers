<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        return view('guest.pages.index', [
            'title' => 'Home',
            'active' => 'home'
        ]);
    }

    public function staff()
    {
        return view('staff.pages.index', [
            'title' => 'Staff Home',
            'active' => 'staff.home'
        ]);
    }

    public function villa()
    {
        return view('villa.pages.index', [
            'title' => 'Villa',
            'active' => 'villa'
        ]);
    }
}
