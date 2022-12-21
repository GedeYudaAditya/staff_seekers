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
        return view('villa.pages.staff_desc', [
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

    public function dashboard()
    {
        return view('villa.pages.dashboard', [
            'title' => 'Dashboard',
            'active' => 'villa.dashboard'
        ]);
    }

    public function profile()
    {
        return view('villa.pages.profile', [
            'title' => 'Profile',
            'active' => 'villa.profile'
        ]);
    }

    public function lowongan()
    {
        return view('villa.pages.lowongan', [
            'title' => 'Lowongan',
            'active' => 'villa.lowongan'
        ]);
    }

    public function pendaftar()
    {
        return view('villa.pages.pendaftar', [
            'title' => 'Lowongan',
            'active' => 'villa.lowongan'
        ]);
    }
}
