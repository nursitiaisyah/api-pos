<?php

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\ProductCategoryController;
use App\Http\Controllers\Api\V1\ProductCategoryImageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\Group;

Route::prefix('v1')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/me', [AuthController::class, 'me']);
        Route::post('/logout', [AuthController::class, 'logout']);

        Route::get('product-categories/options', [ProductCategoryController::class, 'options']);
        Route::post('product-categories/{id}/image', [ProductCategoryImageController::class, 'store']);
        Route::apiResource('product-categories', ProductCategoryController::class);
    });
});
