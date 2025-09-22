<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

//404
Route::fallback(function () {
    return redirect('/');
});

//FRONTEND
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'home');
    Route::get('/shops', 'shops');
    Route::get('/contact', 'contact');
    Route::get('/login', 'login');
    Route::get('/forgot-password', 'forgotpassword');
    Route::get('/register', 'register');
    Route::get('/shopsingle', 'shopsingle');
});
