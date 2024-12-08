<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\RestaurantController;

Route::get('/', function () {
    return view('login');
});
Route::post('/user', [UserController::class, 'store'])->name('user.store');
Route::get('/registerpage', [UserController::class, 'registerpage'])->name('user.registerpage');
Route::post('/register', [UserController::class, 'register'])->name('user.register'); 
Route::get('/search', [GroupController::class, 'search'])->name('group.search');
Route::get('/grouppage/{user_id}/{group_id}', [GroupController::class, 'grouppage'])->name('group.grouppage');
Route::get('/restaurantpage/{cafe_id}/{user_id}', [RestaurantController::class, 'restaurantpage'])->name('restaurant.restaurantpage');
Route::get('/roulettepage',[RestaurantController::class, 'roulettepage'])->name('restaurant.roulettepage');
Route::get('/reputation', [RestaurantController::class, 'reputation'])->name('restaurant.reputation');
