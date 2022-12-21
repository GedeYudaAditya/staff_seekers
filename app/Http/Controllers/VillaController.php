<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class VillaController extends Controller
{
    //
    public function index()
    {
        return view('villa.pages.index', [
            'title' => 'Villa',
            'active' => 'villa'
        ]);
    }

    public function findStaff()
    {
        $staffs = User::where('role', 'staff')->get();
        return view('villa.pages.findstaff', [
            'title' => 'Find Staff',
            'active' => 'villa.find-staff',
            'staffs' => $staffs
        ]);
    }

    public function detailStaff(User $user)
    {
<<<<<<< HEAD
        return view('villa.pages.staff_desc', [
=======
        return view('villa.pages.detailstaff', [
>>>>>>> 8838e0464e97d542cd58e33fcb0b55b9d6bf08e2
            'title' => 'Detail Staff',
            'active' => 'villa.find-staff',
            'staff' => $user
        ]);
    }

    public function about()
    {
        return view('villa.pages.about', [
            'title' => 'About',
            'active' => 'villa.about'
        ]);
    }
<<<<<<< HEAD
=======

    public function staffDesc(User $user)
    {
        // $staff = User::where('id', $user->id)->get();
        // @dd($user);
        return view('villa.pages.staff_desc', [
            'title' => 'Staff Desc',
            'active' => 'villa.find-staff',
            // 'staff' => $staff
        ]);
    }
>>>>>>> 8838e0464e97d542cd58e33fcb0b55b9d6bf08e2
}
