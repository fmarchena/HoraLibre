<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProfessionalController;

Route::get('/', [ProfessionalController::class, 'index']);
Route::post('/', [ProfessionalController::class, 'store']);
Route::get('{professional}', [ProfessionalController::class, 'show']);
Route::put('{professional}', [ProfessionalController::class, 'update']);
Route::delete('{professional}', [ProfessionalController::class, 'destroy']);
