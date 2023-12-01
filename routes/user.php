<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\AuthController;
use App\Http\Controllers\Dashboard\UserController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Route::post('/register', [UserController::class, 'signup'])->name('signup');

        Route::get('/signup', [UserController::class, 'signupPage'])->name('signupPage');

        Route::group(['prefix' => 'dashboard', 'as' => 'user.', 'middleware' => ['auth:web']], function () {
            Route::get('/user/index', [AuthController::class, 'index'])->name('index');
            Route::post('/user/signout', [AuthController::class, 'signout'])->name('signout');
        });
    }
);
