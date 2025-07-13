<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KampusController;

Route::get('/kampus', [KampusController::class, 'index']);
Route::get('/kampus/{id}', [KampusController::class, 'show']);
Route::post('/kampus', [KampusController::class, 'store']);
Route::put('/kampus/{id}', [KampusController::class, 'update']);
Route::delete('/kampus/{id}', [KampusController::class, 'destroy']);

Route::get('/test', function () {
    return response()->json(['message' => 'API aktif']);
});
