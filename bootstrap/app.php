<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'bread' =>  \App\Http\Middleware\BreadcrumbMiddleware::class,
            'navigation' => \App\Http\Middleware\NavigationMiddleware::class,
        ]);
        $middleware->web([
            \App\Http\Middleware\BreadcrumbMiddleware::class,
            \App\Http\Middleware\NavigationMiddleware::class,
        ]); 
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
