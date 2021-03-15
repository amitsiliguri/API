<?php
use Illuminate\Support\Facades\Route;
// admin user
use Easy\Commerce\Http\Controllers\Admin\LoginController;
// category
use Easy\Commerce\Http\Controllers\Catalog\Category\Admin\CreateController as categoryCreateController;
use Easy\Commerce\Http\Controllers\Catalog\Category\Admin\UpdateController as categoryUpdateController;
use Easy\Commerce\Http\Controllers\Catalog\Category\Admin\TreeController as categoryTreeController;
use Easy\Commerce\Http\Controllers\Catalog\Category\Admin\GetController as categoryGetController;
use Easy\Commerce\Http\Controllers\Catalog\Category\Admin\TreeReOrderController as categoryTreeReOrderController;
// Product
use Easy\Commerce\Http\Controllers\Catalog\Product\Admin\IndexController as productIndexController;
use Easy\Commerce\Http\Controllers\Catalog\Product\Admin\StoreController as productStoreController;
//Supplier
use Easy\Commerce\Http\Controllers\Supplier\Admin\ResourceController as supplierResourceController;
use Easy\Commerce\Http\Controllers\Supplier\Address\Admin\ResourceController as supplierAddressResourceController;
use Easy\Commerce\Http\Controllers\Supplier\ContactPerson\Admin\ResourceController as supplierContactPersonResourceController;
// admin user
Route::prefix('user')->name('user.')->group(function () {
    Route::post('request/token', [LoginController::class, 'requestToken'])->name('request.token');
});

// Category
Route::prefix('category')->name('category.')->middleware('auth:sanctum')->group(function () {
    Route::prefix('tree')->name('tree.')->group(function () {
        Route::get('/', [categoryTreeController::class, 'index'])->name('index');
        Route::post('/reorder', [categoryTreeReOrderController::class, 'reorder'])->name('reorder');
    });
    Route::get('get/{id}', [categoryGetController::class, 'get'])->name('get');
    Route::post('store', [categoryCreateController::class, 'store'])->name('store');
    Route::put('update/{id}', [categoryUpdateController::class, 'update'])->name('update');
});
// Product
Route::prefix('product')->name('product.')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [productIndexController::class, 'index'])->name('index');
    Route::post('store', [productStoreController::class, 'store'])->name('store');
});
// Supplier
Route::prefix('supplier')->name('supplier.')->middleware('auth:sanctum')->group(function () {
    Route::prefix('address')->name('address.')->group(function () {
        Route::get('/{supplier_id}', [supplierAddressResourceController::class, 'index'])->name('index');
        Route::post('store', [supplierAddressResourceController::class, 'store'])->name('store');
        Route::put('update/{id}', [supplierAddressResourceController::class, 'update'])->name('update');
    });
    Route::prefix('contact/person')->name('contact.person.')->group(function () {
        Route::get('/{supplier_id}', [supplierContactPersonResourceController::class, 'index'])->name('index');
        Route::post('store', [supplierContactPersonResourceController::class, 'store'])->name('store');
        Route::put('update/{id}', [supplierContactPersonResourceController::class, 'update'])->name('update');
    });
    Route::get('/', [supplierResourceController::class, 'index'])->name('index');
    Route::get('edit/{id}', [supplierResourceController::class, 'edit'])->name('edit');
    Route::post('store', [supplierResourceController::class, 'store'])->name('store');
    Route::put('update/{id}', [supplierResourceController::class, 'update'])->name('update');
});