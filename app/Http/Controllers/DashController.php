<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashController extends Controller
{
    //
    public function index (Request $request) {
        return view('Dashboard.index');
    }
}
