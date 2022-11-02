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
        // dd($username);
        // User::destroy($username->id);
        User::where('id', $user->id)->delete();
        return back()->with('success', 'Delete data user success');
    }

    public function edit(User $user, Request $request)
    {
        $validationData = $request->validate([
            'status' => 'required',
            'role' => 'required'
        ]);

        try {
            User::where('id', $user->id)->update($validationData);

            return back()->with('success', 'Update data user success');
        } catch (\Exception $e) {
            dd($e);
            // return back()->with('error', 'Update data user failed | ' . $e->getMessage());
        }
    }
}
