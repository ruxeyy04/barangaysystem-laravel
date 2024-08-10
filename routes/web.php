<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\InchargeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [Controller::class, 'index'])->name('login');
Route::get('/authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::group(['prefix' => '/clients', 'as' => 'clients.', 'middleware' => ['auth']], function() {
  Route::get('/index', [ClientController::class, 'index'])->name('index');
  Route::get('/inbox/{user}', [ClientController::class, 'inbox'])->name('inbox');
  Route::get('/profile/{user}', [ClientController::class, 'profile'])->name('profile');
});

Route::group(['prefix' => '/incharges', 'as' => 'incharges.', 'middleware' => ['auth']], function() {
  Route::get('/inbox', [InchargeController::class, 'inbox'])->name('inbox');
  Route::get('/profile/{user}', [InchargeController::class, 'profile'])->name('profile');
  Route::get('/users', [InchargeController::class, 'users'])->name('users');
});

Route::group(['prefix' => '/admins', 'as' => 'admins.', 'middleware' => ['auth']], function() {
  Route::get('/inbox', [AdminController::class, 'inbox'])->name('inbox');
  Route::get('/profile/{user}', [AdminController::class, 'profile'])->name('profile');
  Route::get('/users', [AdminController::class, 'users'])->name('users');
  Route::get('/incharges', [AdminController::class, 'incharges'])->name('incharges');
});

Route::resource('messages', MessageController::class)->only(['store'])->middleware('auth');

Route::resource('users', UserController::class)->only('store', 'update', 'destroy')->middleware('auth');

Route::resource('messages.responses', ResponseController::class)->only('store')->middleware('auth');






Route::put('users/diffUpdate/{user}', [UserController::class, 'diffUpdate'])->name('users.diffUpdate')->middleware('auth');