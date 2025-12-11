<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is authenticated and is admin
        if (!auth()->check()) {
            return redirect()->route('login')
                ->with('error', 'Please login to access this area.');
        }

        if (!auth()->user()->is_admin) {
            abort(403, 'Unauthorized action. Admin access required.');
        }

        return $next($request);
    }
}

// Register in bootstrap/app.php or app/Http/Kernel.php:
// protected $middlewareAliases = [
//     'admin' => \App\Http\Middleware\IsAdmin::class,
// ];
