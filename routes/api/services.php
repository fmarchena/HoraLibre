<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ServiceController;

Route::get('/', [ServiceController::class, 'index']);
Route::post('/', [ServiceController::class, 'store']);
Route::get('{service}', [ServiceController::class, 'show']);
Route::put('{service}', [ServiceController::class, 'update']);
Route::delete('{service}', [ServiceController::class, 'destroy']);
Route::get('/by-professional/{professionalId}', [ServiceController::class, 'byProfessional']);