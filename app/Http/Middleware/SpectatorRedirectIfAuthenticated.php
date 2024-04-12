<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;


class SpectatorRedirectIfAuthenticated
{
    
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
            if (Auth::guard('spectator')->check()) {
                return redirect()->route('spectator.dashboard');  
    }

        return $next($request);
    }
}