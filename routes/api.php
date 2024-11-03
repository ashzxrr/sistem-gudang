<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\MutasiController;

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/users', [UserController::class, 'store']);

Route::middleware('auth:sanctum')->get('/users', [UserController::class, 'index']);
Route::middleware('auth:sanctum')->put('/users/{id}', [UserController::class, 'update']);
Route::middleware('auth:sanctum')->delete('/users/{id}', [UserController::class, 'destroy']);


Route::middleware('auth:sanctum')->apiResource('barangs', BarangController::class);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('users', UserController::class);
    Route::apiResource('barangs', BarangController::class);
    Route::apiResource('mutasis', MutasiController::class);

    // Endpoint tambahan untuk history mutasi
    Route::get('/barangs/{id}/history', [MutasiController::class, 'showHistoryForBarang']);
    Route::get('/users/{id}/history', [MutasiController::class, 'showHistoryForUser']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
