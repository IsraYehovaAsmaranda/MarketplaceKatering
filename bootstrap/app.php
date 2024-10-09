<?php

use App\Http\Middleware\CheckDBConnection;
use App\Http\Middleware\EnsureUserIsCustomer;
use App\Http\Middleware\EnsureUserIsMerchant;
use App\Http\Middleware\EnsureUserLoggedIn;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Database\QueryException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->append(CheckDBConnection::class);
        $middleware->alias([
            'loggedin' => EnsureUserLoggedIn::class,
            'ismerchant' => EnsureUserIsMerchant::class,
            'iscustomer' => EnsureUserIsCustomer::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        if ($exceptions instanceof QueryException) {
            dd($exceptions->getMessage());
            //return response()->view('custom_view');
        } elseif ($exceptions instanceof PDOException) {
            dd($exceptions->getMessage());
            //return response()->view('custom_view');
        }
    })->create();
