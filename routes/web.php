<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\VillaController;
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
    Route::get('/', [GuestController::class, 'index'])->name('home');
    Route::get('/signin', [AuthController::class, 'index'])->name('Auth');
    Route::get('/signup', [AuthController::class, 'signup'])->name('register');

    // Action Route
    Route::post('/signin', [AuthController::class, 'signin'])->name('signin.proccess');
    Route::post('/signup', [AuthController::class, 'signupProccess'])->name('register.proccess');
});

// Authenticate user group
Route::group(['middleware' => 'auth'], function () {

    // Group Staff Route
    Route::prefix('/staff')->middleware(['role:staff', 'isActiveAccount:active'])->group(function () {
        // View Route
        Route::get('/', [StaffController::class, 'index'])->name('staff.home');

        // Route::get('/find-job', [StaffController::class, 'findJob'])->name('staff.find-job');

        Route::get('/find-job', [StaffController::class, 'find'])->name('staff.find-job');
        Route::get('/desc', [StaffController::class, 'desc'])->name('staff.desc');


        // Action Route
    });


    // Group Pemilik Villa Route
    Route::prefix('/villa')->middleware(['role:villa', 'isActiveAccount:active'])->group(function () {
        // View Route
        Route::get('/', [VillaController::class, 'index'])->name('villa.home');
        Route::get('/find-staff', [VillaController::class, 'findStaff'])->name('villa.find-staff');
        Route::get('/find-staff/{user:username}', [VillaController::class, 'detailStaff'])->name('villa.find-staff.detail');
        Route::get('/about', [VillaController::class, 'about'])->name('villa.about');

        // Action Route
    });

    // Group Admin Route
    Route::prefix('/admin')->middleware(['role:admin', 'isActiveAccount:active'])->group(function () {
        // View Route
        Route::get('/', [AdminController::class, 'index'])->name('admin.home');
        Route::get('/user', [AdminController::class, 'user'])->name('admin.user');

        // Action Route
        Route::post('/user/delete/{user:username}', [AdminController::class, 'destroy'])->name('admin.user.destroy');
        Route::post('/user/edit/{user:username}', [AdminController::class, 'edit'])->name('admin.user.edit');
    });

    // Inactive User
    Route::get('/inactive', [GuestController::class, 'inactive'])->name('inactive')->middleware('isActiveAccount:inactive');

    // Action Route
    Route::post('/signout', [AuthController::class, 'signout'])->name('signout');
});
