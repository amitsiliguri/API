<?php

use Illuminate\Support\Facades\Route;
use Easy\CatalogCategory\Http\Controllers\CreateController as categoryCreateController;
use Easy\CatalogCategory\Http\Controllers\UpdateController as categoryUpdateController;
use Easy\CatalogCategory\Http\Controllers\TreeController as categoryTreeController;
use Easy\CatalogCategory\Http\Controllers\GetController as categoryGetController;
use Easy\CatalogCategory\Http\Controllers\TreeReOrderController as categoryTreeReOrderController;


Route::prefix('api')->name('api.')->middleware('api')->group(function () {
  Route::prefix('admin')->name('admin.')->group(function () {
    Route::prefix('category')->name('category.')->middleware('auth:sanctum')->group(function () {
      Route::prefix('tree')->name('tree.')->group(function () {
        Route::get('/', [categoryTreeController::class, 'index'])->name('index');
        Route::post('/reorder', [categoryTreeReOrderController::class, 'reorder'])->name('reorder');
      });
      Route::get('get/{id}', [categoryGetController::class, 'get'])->name('get');
      Route::post('store', [categoryCreateController::class, 'store'])->name('store');
      Route::put('update/{id}', [categoryUpdateController::class, 'update'])->name('update');
    });
  });
});
