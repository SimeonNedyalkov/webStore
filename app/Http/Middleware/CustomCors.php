<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CustomCors
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        // Allow specific origins
        $response->headers->set('Access-Control-Allow-Origin', '*'); // Use specific origins instead of '*' if needed

        // Allow specific methods (GET, POST, PUT, DELETE, etc.)
        $response->headers->set('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');

        // Allow specific headers
        $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, X-Requested-With, Authorization, Accept');

        // Allow credentials (if needed)
        $response->headers->set('Access-Control-Allow-Credentials', 'true');

        // Handle preflight request (OPTIONS)
        if ($request->getMethod() == "OPTIONS") {
            return response('', 200)
                ->header('Access-Control-Allow-Origin', '*')
                ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
                ->header('Access-Control-Allow-Headers', 'Content-Type, X-Requested-With, Authorization, Accept');
        }

        return $response;
    }
}
