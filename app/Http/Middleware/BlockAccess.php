<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BlockAccess
{
    public function handle(Request $request, Closure $next)
    {
        $blockedPaths = [
            'users*',
            'auth/*',
            'post/*',
            'admin*',
            'category*',
            'write/*',
            'account/',
        ];

        $referer = $request->headers->get('referer');
        $allowedReferer = 'http://nguyennhi.local';  // Replace with your app's domain

        foreach ($blockedPaths as $path) {
            if ($request->is($path) && (!$referer || !str_contains($referer, $allowedReferer))) {
                return response('Access Denied', 403);
            }
        }

        return $next($request);
    }
}
