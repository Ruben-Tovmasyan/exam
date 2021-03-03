<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::patch('/registration', [UserController::class, 'registration']);

Route::get('/user/{id}', [UserController::class, 'getUser']);

Route::patch('/user/{id}/update', [UserController::class, 'userUpdate']);

Route::delete('/user/{id}/delate', [UserController::class, 'userDelete']);

Route::get('/pagination', [UserController::class, 'pagination']);

Route::patch('/user/{id}/create-post', [UserController::class, 'createPost']);

Route::delete('/user/{id}/delate-post', [UserController::class, 'deletePost']);





