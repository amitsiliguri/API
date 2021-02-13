<?php

use Illuminate\Support\Facades\Route;
use Easy\CatalogCategory\Http\Controllers\CreateController as categoryCreateController;
Route::prefix('api')->name('api.')->middleware('api')->group(function () {
  Route::prefix('admin')->name('admin.')->group(function () {
    Route::prefix('category')->name('user.')->middleware('auth:sanctum')->group(function () {
      Route::post('store', [categoryCreateController::class, 'store'])->name('category.store');
    });
  });
});
