<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::name('index')->middleware('guest')->get('/', function () {
    return view('welcome');
});

Route::name('auth.')->controller(AuthController::class)->group( function() {
    Route::get('/login', 'login')->name('login')->middleware('guest');
    Route::post('/login', 'doLogin')->name('doLogin')->middleware('guest');
    Route::get('/register', 'register')->name('register')->middleware('guest');
    Route::post('/register', 'doRegister')->name('doRegister')->middleware('guest');
    Route::delete('/logout', 'logout')->name('logout')->middleware('auth');
});

Route::prefix('/dash')->name('dash.')->middleware('auth')->controller(DashController::class)->group( function() {
    Route::get('/', 'index')->name('index');
    Route::get('/profile', 'profile')->name('profile');
    Route::get('/users', 'users')->name('users');
});
