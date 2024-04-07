<?php

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\HoTro\DashboardController;
use App\Http\Controllers\HoTro\PaymentController;
use App\Http\Controllers\HoTro\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [HomeController::class, 'index'])->name('welcome');
Route::get('/home', [HomeController::class, 'home'])->name('home');

Auth::routes();

Route::get('font', [HomeController::class, 'font']);

Route::any('/ckfinder/connector', '\CKSource\CKFinderBridge\Controller\CKFinderController@requestAction')
    ->name('ckfinder_connector');

Route::any('/ckfinder/browser', '\CKSource\CKFinderBridge\Controller\CKFinderController@browserAction')
    ->name('ckfinder_browser');

Route::any('/ckfinder/examples/{example?}', 'CKSource\CKFinderBridge\Controller\CKFinderController@examplesAction')
    ->name('ckfinder_examples');

Route::group([
    'middleware' => ['auth'],
    'prefix' => 'hotro',
    'as' => 'hotro.',
], function(){
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/avatar', [UserController::class, 'uploadAvatar'])->name('upload-avatar');
    Route::post('/reset-avatar', [UserController::class, 'resetAvatar'])->name('reset-avatar');
    Route::get('/users/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::get('/users/kick-acc', [UserController::class, 'showKickAccForm'])->name('users.kick-acc');
    Route::post('/users/kick-acc', [UserController::class, 'kickAcc']);
    Route::match(['put', 'patch'], '/users/update', [UserController::class, 'update'])->name('users.update');
    Route::get('/payments/create', [PaymentController::class, 'create'])->name('payments.create');
    Route::post('/payments', [PaymentController::class, 'store'])->name('payments.store');
    Route::post('/payments/genpayment', [PaymentController::class, 'genPaymentInfo'])->name('payments.genpayment');
    Route::get('/payments/transfer/{payment}', [PaymentController::class, 'transfer'])->name('payments.transfer');
    Route::match(['put', 'patch'], '/payments/transfer/{payment}', [PaymentController::class, 'transaction'])->name('payments.transaction');
    Route::match(['put', 'patch'], '/payments/cancel/{payment}', [PaymentController::class, 'cancel'])->name('payments.cancel');
});

// website
Route::get('/master', [HomeController::class, 'master'])->name('master');
Route::get('/categories/{category:slug}', [HomeController::class, 'category'])->name('cat_posts');
Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::get('/posts/{post:slug}', [HomeController::class, 'singlePost'])->name('single_post');

Route::get('/test', [HomeController::class, 'test'])->name('test');