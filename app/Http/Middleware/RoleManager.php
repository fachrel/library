<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleManager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $userLevel = Auth::user()->level;

        // Map roles to user levels
        $roleLevels = [
            'admin' => 1,
            'operator' => 2,
            'user' => 0
        ];

        foreach ($roles as $role) {
            if (isset($roleLevels[$role]) && $userLevel == $roleLevels[$role]) {
                return $next($request);
            }
        }

        switch ($userLevel) {
            case 0:
                return redirect()->route('client');
            case 1:
                return redirect()->route('admin');
            case 2:
                return redirect()->route('admin');
        }

        return redirect()->route('login');
    }

}
