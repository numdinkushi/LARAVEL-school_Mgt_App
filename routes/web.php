<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
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

Route::get('/', [AuthController::class, 'login'])->name('login.page');
Route::post('login', [AuthController::class, 'authLogin'])->name('login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('forgot-password', [AuthController::class, 'forgetPassword'])->name('forgot-password');
Route::post('forgot-password', [AuthController::class, 'forgotPasswordPost'])->name('forgot-password-post');
Route::get('reset-password/{token}', [AuthController::class, 'resetPassword'])->name('reset-password');
Route::post('reset-password-post/{token}', [AuthController::class, 'resetPasswordPost'])->name('reset-password-post');


Route::group(['middleware' => 'admin'], function () {
    Route::get('admin/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('admin/admin/list', [AdminController::class, 'list'])->name('admin.list');
    Route::get('admin/admin/add', [AdminController::class, 'addAdmin'])->name('admin.add');
    Route::post('admin/admin/add', [AdminController::class, 'storeAdmin'])->name('admin.store');
    Route::get('admin/admin/edit/{id}', [AdminController::class, 'editAdmin'])->name('admin.edit');
    Route::post('admin/admin/edit/{id}', [AdminController::class, 'updateAdmin'])->name('admin.update');
    Route::get('admin/admin/delete/{id}', [AdminController::class, 'deleteAdmin'])->name('admin.delete');
});

Route::group(['middleware' => 'teacher'], function () {
    Route::get('teacher/dashboard', [DashboardController::class, 'dashboard'])->name('teacher.dashboard');
});

Route::group(['middleware' => 'student'], function () {
    Route::get('student/dashboard', [DashboardController::class, 'dashboard'])->name('student.dashboard');
});

Route::group(['middleware' => 'parent'], function () {
    Route::get('parent/dashboard', [DashboardController::class, 'dashboard'])->name('parent.dashboard');
});
