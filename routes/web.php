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

Route::name('index')->get('/', function () {
    return view('welcome');
});

Route::name('auth.')->controller(AuthController::class)->group( function() {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'doLogin')->name('doLogin');
    Route::get('/register', 'register')->name('register');
    Route::post('/register', 'doRegister')->name('doRegister');
    Route::delete('/logout', 'logout')->name('logout');
});

Route::prefix('/dash')->name('dash.')->controller(DashController::class)->group( function() {
    Route::get('/', 'index')->name('index');
});
