<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use App\Http\Middleware\AddSeoMetadata;
use App\Http\Middleware\RequireAdminRole;
use App\Http\Middleware\RequireAdminSession;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->trimStrings(except: ['login_password']);
        $middleware->web(append: [AddSeoMetadata::class]);
        $middleware->alias([
            'admin.session' => RequireAdminSession::class,
            'admin.role' => RequireAdminRole::class,
            'membership.member' => \App\Http\Middleware\RequireMembershipMember::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->dontFlash(['login_password']);
        $exceptions->shouldRenderJsonWhen(
            fn (Request $request) => $request->is('api/*') || $request->expectsJson(),
        );
    })->create();
