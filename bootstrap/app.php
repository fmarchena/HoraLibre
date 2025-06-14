<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
      
        commands: __DIR__.'/../routes/console.php',
        api: __DIR__.'/../routes/api.php',
       then: function () {
        Route::middleware('api')
            ->prefix('api/appointments')
            ->group(base_path('routes/api/appointments.php'));
        Route::middleware('api')
            ->prefix('api/clients')
            ->group(base_path('routes/api/clients.php'));
        Route::middleware('api')
            ->prefix('api/professionals')
            ->group(base_path('routes/api/professionals.php'));
        Route::prefix('api/services')
            ->middleware('api')
            ->group(base_path('routes/api/services.php'));
       },
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
