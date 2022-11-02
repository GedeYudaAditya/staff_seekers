<?php

namespace App\Http\Controllers;

use App\Http\Services\UserDataServices;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Mockery\Expectation;

class AuthController extends Controller
{
    //
    public function index()
    {
        return view('guest.pages.auth.signin', [
            'title' => 'Sign In',
            'active' => 'signin'
        ]);
    }

    public function signin(Request $request)
    {
        // Validate the form
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Sign in the user
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $role = Auth::user()->role;

            if ($role == 'admin') {
                return redirect()->route('admin.home');
            } else if ($role == 'staff') {
                return redirect()->route('staff.home');
            } else if ($role == 'villa') {
                return redirect()->route('villa.home');
            } else {
                return redirect()->route('home');
            }
        }

        return back()->with('loginError', 'Invalid login details');
    }

    public function signout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home');
    }

    public function signup()
    {
        return view('guest.pages.auth.signup', [
            'title' => 'Sign Up',
            'active' => 'signup'
        ]);
    }

    public function signupProccess(Request $request)
    {
        // Validate the form
        $credentials = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'email', 'unique:users'],
            'role' => ['required'],
            'password' => ['required'],
            'password_confirmation' => 'required|min:8|same:password',
        ]);

        try {
            DB::beginTransaction();

            // Create the user with service
            if ($credentials['role'] == 'villa') {
                $credentials['status'] = 'inactive';
            } else {
                $credentials['status'] = 'active';
            }

            $user = User::create([
                'name' => $credentials['name'],
                'username' => $credentials['username'],
                'email' => $credentials['email'],
                'role' => $credentials['role'],
                'status' => $credentials['status'],
                'password' => Hash::make($credentials['password']),
            ]);

            DB::commit();

            // Sign in the user
            Auth::login($user);

            $role = Auth::user()->role;

            if ($role == 'admin') {
                return redirect()->route('admin.home');
            } else if ($role == 'staff') {
                return redirect()->route('staff.home');
            } else if ($role == 'villa') {
                return redirect()->route('villa.home');
            } else {
                return redirect()->route('home');
            }
        } catch (Expectation $e) {
            dd($e);
            // return back()->withErrors('error', $e);
        }
    }
}
