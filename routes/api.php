<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
     Route::get('/products',[ProductController::class,'index']);
     Route::post('/products', [ProductController::class, 'store']);
     Route::get('/products/{id}', [ProductController::class, 'show']);
     Route::put('/products/{id}', [ProductController::class, 'update']);
     Route::delete('/products/{id}', [ProductController::class, 'destroy']);

     Route::get('/orders',[OrderController::class, 'index']);
     Route::post('/orders', [OrderController::class, 'store']);
     Route::get('/orders/{id}', [OrderController::class, 'show']);
     Route::put('/orders/{id}', [OrderController::class, 'update']);
     Route::delete('/orders/{id}', [OrderController::class, 'destroy']);

     Route::get('/categories',[CategoryController::class, 'index']);
     Route::post('/categories', [CategoryController::class, 'store']);
      Route::get('/categories/{id}', [CategoryController::class, 'show']);
      Route::put('/categories/{id}', [CategoryController::class, 'update']);
       Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);
        
})->middleware('auth:sanctum');
