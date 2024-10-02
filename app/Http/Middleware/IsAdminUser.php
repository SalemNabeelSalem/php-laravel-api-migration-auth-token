<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

// php artisan make:middleware IsAdminUser

class IsAdminUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // dd("hello from the IsAdminUser middleware");

        if ($request->input('key') != 'admin') {
            return response()->json(['message' => 'Unauthorized'], 401);
        } else {
            return $next($request);
        }
    }
}
