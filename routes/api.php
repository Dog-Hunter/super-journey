<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('api:auth')->group(function () {
    // UserProfileService
    Route::get('/user/{id}', [AuthController::class, 'getUser']);
    Route::put('/user/{id}', [AuthController::class, 'updateUser']);
    Route::delete('/user/{id}', [AuthController::class, 'deleteUser']);

    // DriverProfileService
});
