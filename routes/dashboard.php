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

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Route::get('signin', [AuthController::class, 'signinPage'])->name('signinPage');
        Route::post('signin', [AuthController::class, 'signin'])->name('signin');

        Route::group(['prefix' => 'dashboard', 'as' => 'admin.', 'middleware' => ['auth:admin']], function () {
            Route::get('/admin/index', [AuthController::class, 'index'])->name('index');
            Route::post('/admin/signout', [AuthController::class, 'signout'])->name('signout');

            //section routes
            Route::group(['prefix' => 'section', 'as' => 'sections.'], function () {
                Route::get('/', [SectionController::class, 'index'])->name('index');
                Route::post('/store', [SectionController::class, 'store'])->name('store');
                Route::prefix('/{sectionId}')->group(function () {
                    Route::put('/update', [SectionController::class, 'update'])->name('update');
                    Route::delete('/delete', [SectionController::class, 'destroy'])->name('destroy');
                });
            });
            //doctors routes
            Route::group(['prefix' => 'doctor', 'as' => 'doctors.'], function () {
                Route::get('/', [DoctorController::class, 'index'])->name('index');
                Route::get('/create', [DoctorController::class, 'create'])->name('create');
                Route::post('/store', [DoctorController::class, 'store'])->name('store');
                Route::delete('/delete_all/doctors', [DoctorController::class, 'deleteAllDoctors'])->name('destroyAll');
                Route::prefix('/{doctorId}')->group(function () {
                    Route::get('/edit', [DoctorController::class, 'edit'])->name('edit');
                    Route::put('/update', [DoctorController::class, 'update'])->name('update');
                    Route::delete('/delete', [DoctorController::class, 'destroy'])->name('destroy');
                });
            });
        });
    }
);