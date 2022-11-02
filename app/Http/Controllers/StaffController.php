<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaffController extends Controller
{
    //
    public function index()
    {
        return view('staff.pages.index', [
            'title' => 'Staff Home',
            'active' => 'staff.home'
        ]);
    }
    public function find()
    {
        return view('staff.pages.findjob', [
            'title' => 'Staff Home',
            'active' => 'staff.home'
        ]);
    }
    public function desc()
    {
        return view('staff.pages.description', [
            'title' => 'Staff Home',
            'active' => 'staff.home'
        ]);
    }
    
}
