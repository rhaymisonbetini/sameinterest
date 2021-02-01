<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Interest\InterestController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\UserInterest\UnserInterestController;

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
//rotas de autenticacao
Route::post('/login', [AuthController::class, 'login']);

//rotas de usuário
Route::get('/user/{id}', [UserController::class,'getUser']);

//rotas de amigos
Route::post('/invite', [UserController::class,'inviteFriend']);
Route::post('/aprove', [UserController::class,'aproveFriend']);
Route::post('/refuse', [UserController::class,'refuseFriend']);
Route::post('/block', [UserController::class,'blockFriend']);
Route::post('/delete', [UserController::class,'deleteFriend']);

//rotas de interesse
Route::get('/get-interest',[InterestController::class,'getInterest']);

//rotas de interesses do usuário
Route::get('/get-user-interest',[ UnserInterestController::class, 'getUserInterestById']);


Route::group(['middleware' => 'api'], function () {

});
