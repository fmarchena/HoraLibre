<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ClientController;

Route::get('/', [ClientController::class, 'index']);
Route::post('/', [ClientController::class, 'store']);
Route::get('{client}', [ClientController::class, 'show']);
Route::put('{client}', [ClientController::class, 'update']);
Route::delete('{client}', [ClientController::class, 'destroy']);
