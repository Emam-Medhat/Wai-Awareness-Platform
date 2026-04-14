<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Visitor;
use Carbon\Carbon;

class TrackVisitorMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Don't track admin or AJAX requests
        if (
            $request->is('admin/*') ||
            $request->is('api/*') ||
            $request->ajax() ||
            $request->wantsJson()
        ) {
            return $next($request);
        }

        $this->trackVisitor($request);

        return $next($request);
    }

    /**
     * Track visitor information
     */
    protected function trackVisitor(Request $request): void
    {
        $ip = $request->ip();
        $userAgent = $request->userAgent();
        $url = $request->fullUrl();
        $referer = $request->header('referer');

        // Get or create visitor record
        $visitor = Visitor::firstOrCreate(
            [
                'ip_address' => $ip,
                'date' => Carbon::today()->format('Y-m-d')
            ],
            [
                'user_agent' => $userAgent,
                'url' => $url,
                'referer' => $referer,
                'country' => $this->getCountryFromIP($ip),
                'city' => $this->getCityFromIP($ip),
                'visits' => 0
            ]
        );

        // Update visitor statistics
        $visitor->increment('visits');
        
        // Parse user agent for device info
        $visitor->parseUserAgent();
        
        // Get location from IP
        $visitor->getLocationFromIp();
    }

    /**
     * Get country from IP (simplified version)
     */
    protected function getCountryFromIP(string $ip): string
    {
        // In production, you would use a proper IP geolocation service
        // For now, return Saudi Arabia as default
        return 'Saudi Arabia';
    }

    /**
     * Get city from IP (simplified version)
     */
    protected function getCityFromIP(string $ip): string
    {
        // In production, you would use a proper IP geolocation service
        // For now, return Riyadh as default
        return 'Riyadh';
    }
}
