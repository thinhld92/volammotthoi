<?php

use App\Http\Controllers\Api\AccountActionController;
use App\Http\Controllers\Api\TopServerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('accounts')->name('users.')->group(function(){
    Route::resource('habits', AccountActionController::class);
    Route::resource('topservers', TopServerController::class);
});