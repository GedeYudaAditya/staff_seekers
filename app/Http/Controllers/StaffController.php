<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Models\User;
=======
>>>>>>> 8838e0464e97d542cd58e33fcb0b55b9d6bf08e2
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

<<<<<<< HEAD
    public function find()
    {
        $villas = User::where('role', 'villa')->get();
        return view('staff.pages.findjob', [
            'title' => 'Find Job',
            'active' => 'staff.find-job',
            'villas' => $villas
        ]);
    }
    public function desc(User $user)
    {
        return view('staff.pages.description', [
            'title' => 'Detail Villa',
            'active' => 'staff.find-job',
            'villa' => $user
        ]);
    }
=======

    public function findJob()
    {
        return view('staff.pages.findjob', [
            'title' => 'Find Job',
            'active' => 'staff.find-job'
        ]);
    }

    public function find()
    {
        return view('staff.pages.findjob', [
            'title' => 'Find Job',
            'active' => 'staff.find-job'
        ]);
    }
    public function desc()
    {
        return view('staff.pages.description', [
            'title' => 'Staff Home',
            'active' => 'staff.home'
        ]);
    }
    

>>>>>>> 8838e0464e97d542cd58e33fcb0b55b9d6bf08e2
}
