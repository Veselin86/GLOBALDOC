<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TermController;
use App\Http\Controllers\Api\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::delete('delete/{user}', [\App\Http\Controllers\Api\UserController::class, 'destroy']);
Route::post('login', [\App\Http\Controllers\Api\UserController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::post('logout', [\App\Http\Controllers\Api\UserController::class, 'logout']);
    Route::get('users', [\App\Http\Controllers\Api\UserController::class, 'index']);
    Route::get('user/{user}', [\App\Http\Controllers\Api\UserController::class, 'show']);
    Route::post('create', [\App\Http\Controllers\Api\UserController::class, 'store']);
});

Route::middleware('api')->group(function () {
    Route::apiResource('terms', TermController::class);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
     return $request->user();
});
