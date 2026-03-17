<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\OrderItemController;
use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/products', [ProductController::class, 'index']);
Route::post('/products', [ProductController::class, 'store']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::put('/products/{id}', [ProductController::class, 'update']);
Route::delete('/products/{id}', [ProductController::class, 'destroy']);

Route::get('/orders', [OrderController::class, 'index'])->middleware('auth:sanctum');
Route::post('/orders', [OrderController::class, 'store'])->middleware('auth:sanctum');
Route::get('/orders/{id}', [OrderController::class, 'show'])->middleware('auth:sanctum');
Route::put('/orders/{id}', [OrderController::class, 'update'])->middleware('auth:sanctum');
Route::delete('/orders/{id}', [OrderController::class, 'destroy'])->middleware('auth:sanctum');

Route::get('/categories', [CategoryController::class, 'index']);
Route::post('/categories', [CategoryController::class, 'store']);
Route::get('/categories/{id}', [CategoryController::class, 'show']);
Route::put('/categories/{id}', [CategoryController::class, 'update']);
Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);

Route::get('/carts', [CartController::class, 'index'])->middleware('auth:sanctum');
Route::post('/carts', [CartController::class, 'store'])->middleware('auth:sanctum');
Route::delete('/carts/{id}', [CartController::class, 'destroy'])->middleware('auth:sanctum');
Route::post('/carts/{id}', [CartController::class, 'update'])->middleware('auth:sanctum');
Route::post('/carts/{id}/quantity', [CartController::class, 'updateQuantity'])->middleware('auth:sanctum');
Route::post('/carts/{id}/remove', [CartController::class, 'removeItem'])->middleware('auth:sanctum');
Route::post('/carts/{id}/clear', [CartController::class, 'clear'])->middleware('auth:sanctum');
Route::post('/carts/{id}/checkout', [CartController::class, 'checkout'])->middleware('auth:sanctum');

Route::get('/users', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'store']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);

Route::post('/logout', [AuthController::class, 'logout']);
Route::post('/me', [AuthController::class, 'me']);
Route::post('/refresh', [AuthController::class, 'refresh']);
Route::post('/revoke', [AuthController::class, 'revoke']);
Route::post('/isAuthenticated', [AuthController::class, 'isAuthenticated']);
Route::post('/hasRole', [AuthController::class, 'hasRole']);
Route::post('/hasPermission', [AuthController::class, 'hasPermission']);

Route::get('/order_items', [OrderItemController::class, 'index'])->middleware('auth:sanctum');
Route::post('/order_items', [OrderItemController::class, 'store'])->middleware('auth:sanctum');
Route::get('/order_items/{id}', [OrderItemController::class, 'show'])->middleware('auth:sanctum');
Route::put('/order_items/{id}', [OrderItemController::class, 'update'])->middleware('auth:sanctum');
Route::delete('/order_items/{id}', [OrderItemController::class, 'destroy'])->middleware('auth:sanctum');
Route::post('/order_items/{id}/quantity', [OrderItemController::class, 'updateQuantity'])->middleware('auth:sanctum');

Route::get('/payments', [PaymentController::class, 'index']);
Route::post('/payments', [PaymentController::class, 'store']);
Route::get('/payments/{id}', [PaymentController::class, 'show']);
Route::put('/payments/{id}', [PaymentController::class, 'update']);
Route::delete('/payments/{id}', [PaymentController::class, 'destroy']);
Route::post('/payments/{id}/process', [PaymentController::class, 'process']);
Route::post('/payments/{id}/refund', [PaymentController::class, 'refund']);
Route::post('/payments/{id}/capture', [PaymentController::class, 'capture']);
