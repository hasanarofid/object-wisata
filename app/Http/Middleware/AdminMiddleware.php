<?php

// app/Http/Middleware/AdminMiddleware.php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        // Check if the authenticated user is an admin
        if (auth()->check() && auth()->user()->isAdmin()) {
            return $next($request);
        }

        // Redirect to home or show an unauthorized page
        return redirect('/admin');
    }
}
