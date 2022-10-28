<?php

namespace App\Http\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserDataServices
{
    public static function create($request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->save();

        // $user = User::create([
        //     'name' => $credentials['name'],
        //     'username' => $credentials['username'],
        //     'email' => $credentials['email'],
        //     'role' => $credentials['role'],
        //     'password' => Hash::make($credentials['password']),
        // ]);

        return $user;
    }
}
