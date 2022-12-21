<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, String $route)
    {
        if ($route == 'admin' && auth()->user()->role != 'admin') {
            return redirect('/' . auth()->user()->role);
            // abort('403');
        }
        if ($route == 'staff' && auth()->user()->role != 'staff') {
            return redirect('/' . auth()->user()->role);
            // abort('403');
        }
        if ($route == 'villa' && auth()->user()->role != 'villa') {
            return redirect('/' . auth()->user()->role);
            // abort('403');
        }

        return $next($request);
    }
}
