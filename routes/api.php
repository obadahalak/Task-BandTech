<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\ProductByUserTypeController;

/// start authentication endpoints///
Route::post('login', LoginController::class);
Route::post('Registration', RegistrationController::class);
//// end authentication endpoints///

/// crud user endpoints  /////
Route::resource('users', UserController::class)->except('update');
Route::post('update-user/{users}', [UserController::class, 'update'])->middleware('auth:sanctum');
///end crud user endpoints  /////

/// crud product endpoints  /////
Route::resource('/products', ProductController::class)->except('update');
Route::post('update-product/{product}', [ProductController::class, 'update']);
///end crud product endpoints  /////

/// Fetch product prices according to user type endpoints  ///
Route::prefix('productByUserType')->group(function () {
    Route::get('index', [ProductByUserTypeController::class, 'index'])->middleware('auth:sanctum');
});
/// end Fetch product prices according to user type endpoints  ///
