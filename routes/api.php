<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\MutasiController;

Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);


Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('barang', BarangController::class);
    Route::apiResource('mutasi', MutasiController::class);

    // Mutasi History for Barang
    Route::get('barang/{id}/mutasi', [UserController::class, 'barangMutasiHistory']);

    // Mutasi History for User
    Route::get('user/{id}/mutasi', [UserController::class, 'userMutasiHistory']);
});
