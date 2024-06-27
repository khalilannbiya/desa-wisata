<?php

use App\Http\Middleware\CheckRemainingImages;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'role' => \App\Http\Middleware\CheckRole::class,
            'prevent.superadmin.edit' => \App\Http\Middleware\PreventSuperAdminEdit::class,
            'prevent.superadmin.update' => \App\Http\Middleware\PreventSuperAdminUpdate::class,
            'prevent.superadmin.create' => \App\Http\Middleware\PreventSuperAdminCreate::class,
            'check.destination.active' => \App\Http\Middleware\CheckDestinationActive::class,
            'check.remaining.images' => \App\Http\Middleware\CheckRemainingImages::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
