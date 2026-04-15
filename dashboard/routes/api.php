<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\BrandsController;
use App\Http\Controllers\DriversController;
use App\Http\Controllers\RentalsController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\loyalty_levelsController;



Route::resource('/users', UsersController::class);
Route::resource('/cars', CarsController::class);
Route::resource('/brands', BrandsController::class);
Route::resource('/drivers', DriversController::class);
Route::resource('/rentals', RentalsController::class);
Route::resource('/payments', PaymentsController::class);
Route::resource('/loyalty_levels', loyalty_levelsController::class);

Route::post('/updateStatus/{id}', [CarsController::class, 'updateStatus']);
Route::post('/uStatus/{id}', [RentalsController::class, 'uStatus']);
