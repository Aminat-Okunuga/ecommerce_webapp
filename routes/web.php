<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::match(['get', 'post'], '/admin', [AdminController::class, 'login']);

Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);

Route::get('/logout', [AdminController::class, 'logout']);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
