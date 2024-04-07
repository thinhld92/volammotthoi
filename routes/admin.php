<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\Auth\LoginController;
use App\Http\Controllers\Backend\Auth\ForgotPasswordController;
use App\Http\Controllers\Backend\Auth\ResetPasswordController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\PaymentController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\TestController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\WebsiteConfigController;
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

Route::get('login', [LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('login', [LoginController::class, 'login']);

Route::post('logout', [LoginController::class, 'logout'])->name('admin.logout');
Route::get('logout', [LoginController::class, 'logout']); // @Todo Remove logout GET method

Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('admin.password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('admin.password.email');

Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('admin.password.update');

Route::group([
        'middleware' => ['admin.auth'],
        'as' => 'admin.'
    ],
    function () {
    Route::get('/', [DashboardController::class, 'index']);
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('users/list', [UserController::class, 'usersList'])->name('users.list');
    // Route::get('users-data', [UserController::class, 'usersData'])->name('users-data');
    Route::post('categories/sort-order', [CategoryController::class, 'sortOrder'])->name('categories.sort-order');
    Route::resource('users', UserController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('posts', PostController::class);
    Route::resource('admins', AdminController::class);
    Route::resource('banners', BannerController::class);
    Route::resource('configs', WebsiteConfigController::class);
    Route::get('test', [TestController::class, 'index'])->name('test');
    Route::get('payments', [PaymentController::class, 'index'])->name('payments.index');
    Route::get('payments/{$payment}/approve', [PaymentController::class, 'approve'])->name('payments.approve');
    Route::match(['put', 'patch'], 'payments/{payment}', [PaymentController::class, 'update'])->name('payments.update');
});

