<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PageController;

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

Route::get('/', [PageController::class, 'index'])->name('index');

Route::prefix('user')->name('user.')->group(function () {
   Route::get('login', [UserController::class, 'loginPage'])->name('loginPage');
   Route::post('login', [UserController::class, 'login'])->name('login');
   Route::get('signup', [UserController::class, 'signupPage'])->name('signupPage');
   Route::post('signup', [UserController::class, 'signup'])->name('signup');
   Route::get('logout', [UserController::class, 'logout'])->name('logout');
});
