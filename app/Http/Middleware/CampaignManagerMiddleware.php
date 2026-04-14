<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CampaignManagerMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return redirect()->route('login')
                ->with('error', 'يجب تسجيل الدخول أولاً');
        }

        if (!auth()->user()->canManageCampaigns()) {
            abort(403, 'غير مصرح لك بالوصول إلى هذه الصفحة');
        }

        // Log campaign manager access
        \Log::info('Campaign manager access', [
            'user_id' => auth()->id(),
            'ip' => $request->ip(),
            'url' => $request->fullUrl(),
            'role' => auth()->user()->role
        ]);

        return $next($request);
    }
}
