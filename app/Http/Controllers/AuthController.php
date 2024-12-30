<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    //
    public function login (Request $request) {
        return view('Auth.login');
    }

    public function doLogin (Request $request) {
        return redirect()->route('dash.index');
    }

    public function register (Request $request) {
        return view('Auth.register');
    }

    public function doRegister (RegisterRequest $request) {
        User::create([
            'matricule' => $request->matricule,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'email_verified_at' => now(),
        ]);
        return redirect()->route('auth.login')->with('success', 'Account created successfully');
    }

    public function logout (Request $request) {
        return redirect()->route('index');
    }

}
