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
Route::get('/about', [GuestController::class, 'about'])->name('about');

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

        Route::get('/find-job', [StaffController::class, 'searchJob'])->name('staff.find-job');
        // Route::get('/find-job/search', [StaffController::class, 'searchJob'])->name('staff.searchjob');
        Route::get('/manage', [StaffController::class, 'manage'])->name('staff.manage');
        Route::get('manage/listRequestedJob', [StaffController::class, 'requestedJobList'])->name('staff.listRequestedJob');
        Route::get('manage/listReceivedJob', [StaffController::class, 'receivedJobList'])->name('staff.listReceivedJob');
        Route::get('manage/contractList', [StaffController::class, 'contractList'])->name('staff.contractList');

        Route::get('/desc/{user:username}', [StaffController::class, 'desc'])->name('staff.desc');


        // Action Route
        Route::post('/request/{user:username}', [StaffController::class, 'requestJob'])->name('staff.requestJob');
        Route::post('/updateProfile', [StaffController::class, 'updateProfile'])->name('staff.updateProfil');
        Route::post('/manage/listRequestedJob/cencel/{request:id}', [StaffController::class, 'cencelRequestedJob'])->name('staff.cencelRequestedJob');
        Route::post('/manage/listReceivedJob/accept/{request:id}', [StaffController::class, 'acceptJob'])->name('staff.acceptReceivedJob');
        Route::post('/manage/listReceivedJob/decline/{request:id}', [StaffController::class, 'rejectReceivedJob'])->name('staff.declineReceivedJob');
        Route::post('/manage/contractList/decline/{id}', [StaffController::class, 'declineContract'])->name('staff.declineContract');
        Route::post('/manage/contractList/accept/{id}', [StaffController::class, 'acceptContract'])->name('staff.acceptContract');
    });


    // Group Pemilik Villa Route
    Route::prefix('/villa')->middleware(['role:villa', 'isActiveAccount:active'])->group(function () {
        // View Route
        Route::get('/', [VillaController::class, 'index'])->name('villa.home');
        Route::get('/find-staff', [VillaController::class, 'findStaff'])->name('villa.find-staff');
        Route::get('/find-staff/{user:username}', [VillaController::class, 'detailStaff'])->name('villa.find-staff.detail');
        // Route::get('/about', [VillaController::class, 'about'])->name('villa.about');
        Route::get('/dashboard', [VillaController::class, 'dashboard'])->name('villa.dashboard');
        Route::get('/dashboard/profile', [VillaController::class, 'profile'])->name('villa.profile');
        Route::get('/dashboard/lowongan', [VillaController::class, 'lowongan'])->name('villa.lowongan');
        Route::get('/dashboard/pendaftar', [VillaController::class, 'pendaftar'])->name('villa.pendaftar');
        Route::get('/dashboard/permintaan', [VillaController::class, 'permintaanStaff'])->name('villa.permintaanStaff');
        Route::get('/dashboard/manageContract', [VillaController::class, 'manageContract'])->name('villa.manageContract');

        // Action Route
        // Route::post('/dashboard/pendaftar/request/{user:username}', [VillaController::class, 'requestStaff'])->name('villa.requestStaff');
        Route::post('/dashboard/updateProfile', [VillaController::class, 'updateProfile'])->name('villa.updateProfil');
        Route::post('/dashboard/lowongan/create', [VillaController::class, 'tambahLowongan'])->name('villa.createLowongan');

        // Request dari villa ke staff
        Route::post('/request/{user:username}', [VillaController::class, 'requestStaff'])->name('villa.requestStaff');
        Route::post('/dashboard/pendaftar/kelola/{user:username}', [VillaController::class, 'kelolaPendaftar'])->name('villa.kelolaPendaftar');
        Route::post('/dashboard/permintaan/kelola/{user:username}', [VillaController::class, 'kelolaPermintaan'])->name('villa.kelolaPermintaan');
        Route::post('/dashboard/pendaftar/cv/{user:username}', [VillaController::class, 'downloadCVStaff'])->name('villa.cvStaff');

        // contract
        Route::post('/dashboard/manageContract/create/{user:username}', [VillaController::class, 'createContract'])->name('villa.createContract');
        Route::post('/dashboard/manageContract/process/{contract:id}', [VillaController::class, 'processContract'])->name('villa.processContract');
    });

    // Group Admin Route
    Route::prefix('/admin')->middleware(['role:admin', 'isActiveAccount:active'])->group(function () {
        // View Route
        Route::get('/', [AdminController::class, 'index'])->name('admin.home');
        Route::get('/user', [AdminController::class, 'user'])->name('admin.user');
        Route::get('/userReport', [AdminController::class, 'userReport'])->name('admin.userReports');
        Route::get('/bug', [AdminController::class, 'bug'])->name('admin.bug');
        Route::get('/transaction', [AdminController::class, 'transaction'])->name('admin.transaction');

        // Action Route
        Route::post('/user/delete/{user:username}', [AdminController::class, 'destroy'])->name('admin.user.destroy');
        Route::post('/user/edit/{user:username}', [AdminController::class, 'edit'])->name('admin.user.edit');
        Route::post('/user/userReport/{report:slug}', [AdminController::class, 'reportProcess'])->name('admin.user.reportProcess');
        Route::post('/user/bug/{bug:slug}', [AdminController::class, 'reportBug'])->name('admin.user.reportBug');
        Route::post('/user/transaction/{transaction:slug}', [AdminController::class, 'transactionProcess'])->name('admin.user.transactionProccess');
    });

    // Inactive User
    Route::get('/inactive', [GuestController::class, 'inactive'])->name('inactive')->middleware('isActiveAccount:inactive');

    // Action Route
    Route::post('/signout', [AuthController::class, 'signout'])->name('signout');
});
