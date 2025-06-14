<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AppointmentController;

Route::get('/', [AppointmentController::class, 'index']);
Route::post('/', [AppointmentController::class, 'store']);
Route::get('{appointment}', [AppointmentController::class, 'show']);
Route::put('{appointment}/cancel', [AppointmentController::class, 'cancel']);
