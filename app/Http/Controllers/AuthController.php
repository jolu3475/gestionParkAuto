<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function doRegister (Request $request) {
        return redirect()->route('dash.index');
    }

    public function logout (Request $request) {
        return redirect()->route('index');
    }

}
