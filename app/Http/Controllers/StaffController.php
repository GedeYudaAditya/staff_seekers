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

    public function findJob()
    {
        return view('staff.pages.findjob', [
            'title' => 'Find Job',
            'active' => 'staff.find-job'
        ]);
    }
}
