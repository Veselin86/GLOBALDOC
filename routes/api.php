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

// Route::post('login', [\App\Http\Controllers\Api\UserController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::post('login', [\App\Http\Controllers\Api\UserController::class, 'login'])->middleware('auth:api');
    Route::post('logout', [\App\Http\Controllers\Api\UserController::class, 'logout']);
    Route::get('users', [\App\Http\Controllers\Api\UserController::class, 'index']);
    Route::get('user/{user}', [\App\Http\Controllers\Api\UserController::class, 'show']);
    Route::post('create', [\App\Http\Controllers\Api\UserController::class, 'store']);
    Route::delete('delete/{user}', [\App\Http\Controllers\Api\UserController::class, 'destroy'])->middleware('auth:api');
});

Route::middleware('api')->group(function () {
    Route::apiResource('terms', TermController::class);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});

// Route::apiResource('users', UserController::class)->middleware('auth.jwt');
// Route::post('login', [UserController::class, 'login']);
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\API\TermApiController;
// use App\Http\Controllers\API\UserApiController;




// Route::post('login', [UserApiController::class, 'login']);
// Route::apiResource ('users', UserApiController::class);

// Route::apiResource('terms', TermApiController::class)->middleware('auth:api');

// Route::apiResource('users', UserApiController::class)->only(['index'])->middleware('auth:api');


// Route::apiResource('terms', TermApiController::class)->middleware('auth:api');