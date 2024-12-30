<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\loginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    //
    public function login (Request $request) {
        return view('Auth.login');
    }

    public function doLogin (loginRequest $request) {
        if(Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->intended(route('dash.index'));
        }

        return redirect()->back()->with('error', 'Vérifiez vos identifiants');
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
        Auth::logout();
        return redirect()->route('index');
    }

}
