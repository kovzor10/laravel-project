<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AddUserController;

// home
Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('auth');

// user login
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');

// user registration
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerPost'])->name('register.post');

// user logout
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// edit user
Route::get('/edit/{user}', [UserController::class, 'edit'])->name('user.edit');
Route::post('/edit/{user}', [UserController::class, 'update'])->name('user.update');

// delete user
Route::delete('/destroy/{user}', [UserController::class, 'destroy'])->name('user.destroy');

// add user
Route::get('/addUser', [AddUserController::class, 'addUser'])->name('user.add');
Route::post('/addUser', [AddUserController::class, 'addUserPost'])->name('user.add.post');
