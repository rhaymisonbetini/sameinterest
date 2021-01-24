<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\User\UserController;

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
Route::post('/login', [AuthController::class, 'login']);

Route::get('/user/{id}', [UserController::class,'getUser']);

Route::post('/invite', [UserController::class,'inviteFriend']);
Route::post('/aprove', [UserController::class,'aproveFriend']);
Route::post('/refuse', [UserController::class,'refuseFriend']);

Route::group(['middleware' => 'api'], function () {

});