<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {

//    $user = User::query()->create([
//        'username' => 'username' . uniqid(),
//        'email' => uniqid() . '@gmail.com',
//        'password' => Hash::make('12345'),
//    ]);

//    User::query()->find(4)->update([
//        'username' => 'new user',
//        'email' => '123@mail.ru'
//    ]);
//
//    dd();

//    return view('home');
//});

Route::controller(IndexController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/signup', 'signup');
    Route::get('/signin', 'signin');
});

Route::controller(AuthController::class)->prefix('/auth')->as('auth.')->group(function () {
    Route::post('/signup', 'signup')->name('signup'); // auth.signup
    Route::post('/signin', 'signin')->name('signin'); // auth.signin

    Route::get('/logout', 'logout')->name('logout'); // auth.logout
});
