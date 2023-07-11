<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class SessionTimeoutMiddleware
{
    public function handle($request, Closure $next)
    {
        // $isLoggedIn = $request->path() != 'login'; // Exclude the login route from session timeout check

        // if ($isLoggedIn && !Auth::check()) {
        //     // Redirect to login if the user is not authenticated
        //     return redirect('/login');
        // }

        // if ($isLoggedIn && $this->sessionExpired()) {
        //     // Clear the user session and redirect to login
        //     Auth::logout();
        //     $request->session()->invalidate();
        //     return redirect('/login')->with('session_expired', 'Your session has expired. Please log in again.');
        // }

        // return $next($request);
    }

    private function sessionExpired()
    {
        // $lastActivity = session('last_activity');
        // $expiresAt = now()->subMinutes(config('session.lifetime'));

        // return $lastActivity && $lastActivity <= $expiresAt;
    }
}
