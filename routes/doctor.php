<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\AuthController;
use App\Http\Controllers\Dashboard\DoctorController;
use App\Http\Controllers\Dashboard\SectionController;
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

// Route::group(
//     [
//         'prefix' => LaravelLocalization::setLocale(),
//         'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
//     ],
//     function () {
//         Route::get('signin', [AuthController::class, 'signinPage'])->name('signinPage');
//         Route::post('signin', [AuthController::class, 'signin'])->name('signin');

//         Route::group(['prefix' => 'dashboard', 'as' => 'doctor.', 'middleware' => ['auth:doctor']], function () {
//             Route::get('/doctor/index', [AuthController::class, 'index'])->name('index');
//             Route::post('/doctor/signout', [AuthController::class, 'signout'])->name('signout');

//             //doctors routes
//             Route::group(['prefix' => 'doctor'], function () {
//                 Route::get('/', [DoctorController::class, 'index'])->name('index');
//                 Route::put('/update/password', [DoctorController::class, 'updatePassword'])->name('updatePassword');
//                 Route::prefix('/{doctorId}')->group(function () {
//                     Route::get('/edit', [DoctorController::class, 'edit'])->name('edit');
//                     Route::put('/update', [DoctorController::class, 'update'])->name('update');
//                 });
//             });
//         });
//     }
// );
