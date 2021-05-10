<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) { // Si no estamos logueados
            return redirect(route('auth.loginForm'))
                ->withErrorMessage('Tenes que estar autenticado para ver esta pagina.');
        }
        return $next($request);
    }
}
