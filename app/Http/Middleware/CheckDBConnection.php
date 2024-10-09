<?php

namespace App\Http\Middleware;

use Closure;
use DB;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

class CheckDBConnection
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            DB::connection()->getPdo();
        } catch (\Exception $e) {
            throw new HttpException(503);
        }
        return $next($request);
    }
}
