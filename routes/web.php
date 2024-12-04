<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController ;
use App\Http\Controllers\CategoryController ;
use App\Http\Controllers\PostController ;
use App\Http\Controllers\AuthController ;
use App\Http\Controllers\CuisineController;
use App\Http\Controllers\CartController;


Route::get('/', function () {
    return view('home');
});

Route::get('/login', function(){
    return view('auth.login') ;
});
Route::get('/register', function() {
    return view('auth.register');
});
Route::get('/dashboard', function() {
    return view('auth.dashboard');
})->name('dashboard');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout') ;
Route::post('/login', [AuthController::class, 'login'])->name('login') ;
Route::post('/register', [AuthController::class, 'register'])->name('register') ;

Route::resource('users', UserController::class) ;
Route::resource('categories', CategoryController::class) ;
Route::resource('posts', PostController::class) ;

Route::resource('cuisines', CuisineController::class);

Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');


