<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $user = new User();

        $user->email = $request['email'];
        $user->name = $request['name'];
        $user->password = bcrypt($request['password']);

        $user->save();

        Auth::login($user);

        return redirect()->route('dashboard');
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
            return redirect()->route('dashboard');
        }
        return redirect()->back();
    }
}
