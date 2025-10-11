<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    ContactController,
    HomeController,
    ShopController
};

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
    Route::get('/', 'index');
    Route::get('login', 'login');
    Route::get('forgot-password', 'forgotpassword');
    Route::get('register', 'register');
    Route::get('shopsingle', 'shopsingle');
});
// Route pour les Boutiques
Route::get('shops', [ShopController::class, 'index']);
// Route pour les Contacts
Route::controller(ContactController::class)->group(function () {
    Route::get('contact', 'index');
    Route::post('sendmail', 'sendmail');
});
