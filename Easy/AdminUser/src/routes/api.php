<?php

use Illuminate\Support\Facades\Route;
use Easy\AdminUser\Http\Controllers\LoginController;

Route::prefix('api')->name('api.')->middleware('api')->group(function () {
  Route::prefix('admin')->name('admin.')->group(function () {
    Route::prefix('user')->name('user.')->group(function () {
      Route::post('login', [LoginController::class, 'login'])->name('login');
      Route::middleware('auth:sanctum')->get('test', [LoginController::class, 'test'])->name('test');
    });
  });
});
