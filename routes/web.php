<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SubjectController;
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

    //class url
    Route::get('admin/class/list', [ClassController::class, 'list'])->name('admin.class-list');
    Route::get('admin/class/add', [ClassController::class, 'add'])->name('admin.class.add');
    Route::post('admin/class/store', [ClassController::class, 'store'])->name('admin.class.store');
    Route::get('admin/class/edit/{id}', [ClassController::class, 'edit'])->name('admin.class.edit');
    Route::post('admin/class/edit/{id}', [ClassController::class, 'update'])->name('admin.class.update');
    Route::get('admin/class/delete/{id}', [ClassController::class, 'delete'])->name('admin.class.delete');

    //subjects
    Route::get('admin/subject/list', [SubjectController::class, 'list'])->name('admin.subject-list');
    Route::get('admin/subject/add', [SubjectController::class, 'add'])->name('admin.subject.add');
    Route::post('admin/subject/store', [SubjectController::class, 'store'])->name('admin.subject.store');
    Route::get('admin/subject/edit/{id}', [SubjectController::class, 'edit'])->name('admin.subject.edit');
    Route::post('admin/subject/edit/{id}', [SubjectController::class, 'update'])->name('admin.subject.update');
    Route::get('admin/subject/delete/{id}', [SubjectController::class, 'delete'])->name('admin.subject.delete');
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
