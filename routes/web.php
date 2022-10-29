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
    // View Route
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/signin', [AuthController::class, 'index'])->name('Auth');
    Route::get('/signup', [AuthController::class, 'signup'])->name('register');

    // Action Route
    Route::post('/signin', [AuthController::class, 'signin'])->name('signin.proccess');
    Route::post('/signup', [AuthController::class, 'signupProccess'])->name('register.proccess');
});

// Authenticate user group
Route::group(['middleware' => 'auth'], function () {

    // Group Staff Route
    Route::prefix('/staff')->group(function () {
        // View Route
        Route::get('/', [HomeController::class, 'staff'])->name('staff.home');

        // Action Route
    });

    // Group Pemilik Villa Route
    Route::prefix('/villa')->group(function () {
        // View Route
        Route::get('/', [HomeController::class, 'villa'])->name('villa.home');

        // Action Route
    });

    // Group Admin Route
    Route::prefix('/admin')->group(function () {
        // View Route
        Route::get('/', [HomeController::class, 'admin'])->name('admin.home');

        // Action Route
    });

    // Action Route
    Route::post('/signout', [AuthController::class, 'signout'])->name('signout');
});
