<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TrackVisitor
{
    public function handle(Request $request, Closure $next)
    {
        $ip = $request->ip();
        $userAgent = $request->userAgent();
        $url = $request->fullUrl();
        
        Log::info('Visitor tracked', [
            'ip' => $ip,
            'user_agent' => $userAgent,
            'url' => $url,
            'timestamp' => now(),
            'user_id' => auth()->id() ?: 'guest'
        ]);

        return $next($request);
    }
}
