<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\LoginController;
use App\Http\Controllers\API\LogoutController;
use App\Http\Controllers\API\RegisterController;


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


Route::post('login', LoginController::class)->name('api.login');
Route::post('register', RegisterController::class)->name('api.register');
Route::post('logout', LogoutController::class)->name('api.logout');

Route::middleware('auth:sanctum')->get('/auth', function () {
    return true;
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});