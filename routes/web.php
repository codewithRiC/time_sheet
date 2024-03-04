<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegistrationController;
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
Route::get('/', [UserController::class, 'login']);


Route::get('login', [UserController::class, 'login'])->name('login');
Route::get('register', [UserController::class, 'register'])->name('register');
Route::get('about', [UserController::class, 'about'])->name('about');
Route::get('home', [UserController::class, 'home'])->name('home');
Route::get('forgetpassword', [UserController::class, 'forgetpassword'])->name('forgetpassword');
Route::get('resetpassword', [UserController::class, 'resetpassword'])->name('resetpassword');
Route::get('admindashboard', [UserController::class, 'admindashboard'])->name('admindashboard');
Route::get('managerdashboard', [UserController::class, 'managerdashboard'])->name('managerdashboard');
Route::get('employeedashboard', [UserController::class, 'employeedashboard'])->name('employeedashboard');

Route::post('/register', [RegistrationController::class, 'register']);
Route::post('/login', [RegistrationController::class, 'login']);