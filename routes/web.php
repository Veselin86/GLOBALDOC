<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TermController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\DescriptionController;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', [IndexController::class, 'index']);

Route::resource('/users', UserController::class)->names('users');

Route::resource('/terms', TermController::class)->names('terms');
Route::get('/terms/filter/{filter?}', [TermController::class, 'index'])->name('terms.filter');

Route::resource('/types', TypeController::class)->names('types');
Route::get('/types/filter/{filter?}', [TypeController::class, 'index'])->name('types.filter');

Route::resource('ideas', IdeaController::class)->names('ideas');

Route::resource('descriptions', DescriptionController::class)->names('descriptions');
Route::get('descriptions/create/{termId?}', [DescriptionController::class, 'create'])->name('descriptions.create');


// Route::delete('/ideas/{idea}', [IdeaController::class, 'destroy'])->name('ideas.destroy');
// Route::put('/ideas/{idea}', [IdeaController::class, 'update'])->name('ideas.update');
// Route::get('/ideas/{id}/edit', [IdeaController::class, 'edit'])->name('ideas.edit');

// Route::delete('/terms/{terms}/ideas/{idea}', [IdeaController::class, 'destroy'])->name('ideas.destroy');
// Route::put('/terms/{terms}/ideas/{idea}', [IdeaController::class, 'update'])->name('ideas.update');



// Route::get('/users', [UserController::class, 'index'])->name('users.index');
// Route::get('/terms', [TermController::class, 'index'])->name('terms.index');


// Route::get('/types', [TypeController::class, 'index'])->name('types.index');
// Route::get('/types/{filter?}', [TypeController::class, 'index'])->name('types.index');



// Route::get('/users/{nia}', [UserController::class, 'show'])->name('users.show');
// Route::delete('/users/{nia}', [UserController::class, 'destroy'])->name('users.destroy');
// Route::get('/users/{nia}/edit', [UserController::class, 'edit'])->name('users.edit');
// Route::put('/users/{nia}', [UserController::class, 'update'])->name('users.update');
// Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
// Route::post('/users', [UserController::class, 'store'])->name('users.store');


// Route::get('/terms/{id}', [TermController::class, 'show'])->name('terms.show');
// Route::delete('/terms/{id}', [TermController::class, 'destroy'])->name('terms.destroy');
// Route::get('/terms/{id}/edit', [TermController::class, 'edit'])->name('terms.edit');
// Route::put('/terms/{id}', [TermController::class, 'update'])->name('terms.update');
// Route::get('/terms/create', [TermController::class, 'create'])->name('terms.create');
// Route::post('/terms', [TermController::class, 'store'])->name('terms.store');



// Route::get('/types/{id}', [TypeController::class, 'show'])->name('types.show');
// Route::delete('/types/{id}', [TypeController::class, 'destroy'])->name('types.destroy');
// Route::get('/types/{id}/edit', [TypeController::class, 'edit'])->name('types.edit');
// Route::put('/types/{id}', [TypeController::class, 'update'])->name('types.update');
// Route::get('/types/create', [TypeController::class, 'create'])->name('types.create');
// Route::post('/types', [TypeController::class, 'store'])->name('types.store');
// Route::resource('/types', TypeController::class)->names('types');


// Route::get('types/create', [TypeController::class, 'create'])->name('types.create');
// Route::get('types/{type}', [TypeController::class, 'show'])->name('types.show');

// Route::get('/index', function () {
//     return view('index');
// })->name('index');

// Route::get('login', function () {
//     return view('login');
// })->name('login');

// Route::get('register', function () {
//     return view('register');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
