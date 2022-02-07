<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MeController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\RoleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('register', RegisterController::class)->name('register');
    Route::post('login', [LoginController::class, 'index'])->name('login');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('me', [MeController::class, 'index'])->middleware('auth:api');
    Route::delete('me/{uuid}', [MeController::class, 'delete'])->middleware('auth:api');
    Route::put('update/profile', [MeController::class, 'store_update'])->middleware('auth:api');
    Route::get('mitra', [MitraController::class, 'index'])->middleware('auth:api');
    Route::get('role', RoleController::class)->name('role');
    // Route::post('logout', 'AuthController@logout');
    // Route::post('refresh', 'AuthController@refresh');
});
