<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TermController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\DescriptionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\HomeController;

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



Route::get('/', [IndexController::class, 'index']);

Route::resource('/users', UserController::class)->names('users');

Route::resource('/terms', TermController::class)->names('terms');
Route::get('/terms/filter/{filter?}', [TermController::class, 'index'])->name('terms.filter');

Route::resource('/types', TypeController::class)->names('types');
Route::get('/types/filter/{filter?}', [TypeController::class, 'index'])->name('types.filter');

Route::resource('ideas', IdeaController::class)->names('ideas');

Route::resource('descriptions', DescriptionController::class)->names('descriptions');
Route::get('descriptions/create/{termId?}', [DescriptionController::class, 'create'])->name('descriptions.create');

Route::get('/language/{locale}', function ($locale) {
    Session::put('locale', $locale);
    App::setLocale($locale);
    return back();
})->name('language.switch');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
