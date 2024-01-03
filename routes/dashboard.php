<?php

use Livewire\Livewire;
use Illuminate\Support\Facades\Route;
use App\Livewire\CreateServicePackage;
use App\Http\Controllers\Dashboard\AuthController;
use App\Http\Controllers\Dashboard\DoctorController;
use App\Http\Controllers\Dashboard\SectionController;
use App\Http\Controllers\Dashboard\ServiceController;
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
                Route::put('/update/password', [DoctorController::class, 'updatePassword'])->name('updatePassword');
                Route::delete('/delete_all/doctors', [DoctorController::class, 'deleteAllDoctors'])->name('destroyAll');
                Route::prefix('/{doctorId}')->group(function () {
                    Route::get('/edit', [DoctorController::class, 'edit'])->name('edit');
                    Route::put('/update', [DoctorController::class, 'update'])->name('update');
                    Route::put('/update/status', [DoctorController::class, 'updateStatus'])->name('updateStatus');
                    Route::delete('/delete', [DoctorController::class, 'destroy'])->name('destroy');
                });
            });

               //service routes
               Route::group(['prefix' => 'service', 'as' => 'services.'], function () {
                Route::get('/', [ServiceController::class, 'index'])->name('index');
                Route::get('/create', [ServiceController::class, 'create'])->name('create');
                Route::post('/store', [ServiceController::class, 'store'])->name('store');
                Route::prefix('/{serviceId}')->group(function () {
                    Route::get('/edit', [ServiceController::class, 'edit'])->name('edit');
                    Route::put('/update', [ServiceController::class, 'update'])->name('update');
                    Route::delete('/delete', [ServiceController::class, 'destroy'])->name('destroy');
                });
            });

            //livewire routes
            Route::view('create/service-package', 'livewire.service-packages.include-create-service-package')->name('create.service.package');
            Livewire::setUpdateRoute(function ($handle) {
                return Route::post('/livewire/update', $handle);
            });
            Livewire::setScriptRoute(function ($handle) {
                return Route::get('/livewire/livewire.js', $handle);
            });

        });
    }
);





