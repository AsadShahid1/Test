<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\MailController;
use App\Mail\MailNotify;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

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

// Routes
Route::get('/users',[AdminController::class, 'users'])->name('users');
Route::get('/add',[AdminController::class, 'all'])->name('add');
Route::post('/store',[AdminController::class, 'store'])->name('registered');
Route::get('/password',[AdminController::class, 'password'])->name('password');
Route::post('/set-password',[AdminController::class, 'set_password'])->name('update');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
