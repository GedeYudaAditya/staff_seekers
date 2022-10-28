<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Not authenticated user group
Route::group(['middleware' => 'guest'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get('/signin', [AuthController::class, 'index'])->name('Auth');
    Route::post('/signin', [AuthController::class, 'signin'])->name('signin.proccess');

    Route::get('/register', [AuthController::class, 'register'])->name('register'); // View masih belum isi
    Route::post('/register', [AuthController::class, 'registerProccess'])->name('register.proccess');
});

// Authenticate user group
Route::group(['middleware' => 'auth'], function () {
    Route::prefix('/staff')->group(function () {
        Route::get('/', [HomeController::class, 'staff'])->name('staff.home');
    });

    Route::prefix('/villa')->group(function () {
        Route::get('/', [HomeController::class, 'villa'])->name('villa.home');
    });

    Route::post('/signout', [AuthController::class, 'signout'])->name('signout');
});
