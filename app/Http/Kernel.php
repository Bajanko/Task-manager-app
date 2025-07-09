<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array<string, class-string|string>
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'precognitive' => \Illuminate\Foundation\Http\Middleware\HandlePrecognitiveRequests::class,
        'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
        'admin' => \App\Http\Middleware\AdminMiddleware::class,
    ];

    /**
     * The priority-sorted list of middleware.
     *
     * This can be used to assign middleware to specific routes.
     *
     * @var array
     */
    protected $middleware = [
        // ... existing code ...
    ];

    /**
     * The priority-sorted list of middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        // ... existing code ...
    ];

    /**
     * The priority-sorted list of middleware aliases.
     *
     * @var array
     */
    protected $middlewareAliases = [
        // ... existing code ...
    ];
}