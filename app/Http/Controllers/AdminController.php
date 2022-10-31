<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index()
    {
        return view('admin.pages.index', [
            'title' => 'Admin',
            'active' => 'admin'
        ]);
    }

    public function user()
    {
        $user = User::all();
        return view('admin.pages.user', [
            'title' => 'User',
            'active' => 'user',
            'user' => $user
        ]);
    }

    public function destroy(User $user)
    {
        User::where('id', $user)->delete();
        return back()->with('success', 'Delete data user success');
    }

    public function edit(Request $request, User $user)
    {
        $validationData = $request->validate([
            'status' => 'required'
        ]);

        User::where('id', $user)->update($validationData);
    }
}
