<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class SpectatorAuthenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('spectator.login');
    }

     protected function authenticate($request, array $guards)
    {
            if ($this->auth->guard('spectator')->check()) {
                return $this->auth->shouldUse('spectator');
            }
        

        $this->unauthenticated($request,['spectator']);
    }
}
