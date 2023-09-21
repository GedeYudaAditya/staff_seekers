<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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

    public function about()
    {
        return view('about', [
            'title' => 'About',
            'active' => 'villa.about'
        ]);
    }

    public function reportUser(Request $request, User $user)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        Report::create([
            'user_id' => $user->id,
            'slug' => Str::slug($request->title) . '-' . Str::random(5),
            'title' => $request->title,
            'description' => $request->description,
            'type' => 'report',
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'User has been reported');
    }

    public function reportBug(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        Report::create([
            'user_id' => auth()->user()->id,
            'slug' => Str::slug($request->title) . '-' . Str::random(5),
            'title' => $request->title,
            'description' => $request->description,
            'type' => 'bug',
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Bug has been reported');
    }
}
