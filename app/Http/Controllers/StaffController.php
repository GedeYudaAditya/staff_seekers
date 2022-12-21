<?php

namespace App\Http\Controllers;

use App\Models\User;
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

    public function manage()
    {
        return view('staff.pages.manage', [
            'title' => 'Manage',
            'active' => 'staff.manage'
        ]);
    }

    public function updateProfile(Request $request)
    {
        $validationData = $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'salary' => 'required',
            'bio' => 'required',
            'detailBio' => 'required',
            'address' => 'required',
            'cv' => 'required'
        ]);
    }
}
