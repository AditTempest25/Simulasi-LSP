<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Daftarkan middleware kustom
        $middleware->alias([
        'role' => \App\Http\Middleware\RoleMiddleware::class,
    ]);

    // Atur middleware grup (opsional)
        // $middleware->group('web', [
        //     \App\Http\Middleware\EncryptCookies::class,
        //     \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
        //     \Illuminate\Session\Middleware\StartSession::class,
        //     \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        //     \App\Http\Middleware\VerifyCsrfToken::class,
        //     \Illuminate\Routing\Middleware\SubstituteBindings::class,
        // ]);

        // $middleware->group('api', [
        //     \Illuminate\Routing\Middleware\ThrottleRequests::class.':api',
        //     \Illuminate\Routing\Middleware\SubstituteBindings::class,
        // ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
