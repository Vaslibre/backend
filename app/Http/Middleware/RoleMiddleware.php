<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role, $permission = null)
    {
        if (Auth::guest()) {
            return redirect($urlOfYourLoginPage);
        }

        if (! $request->user()->hasRole($role)) {

            notify()->flash('Oops', 'error', [
                'timer' => 5000,
                'text' => 'No tienes poder aquí',
            ]);

            return redirect()->route('home');
        }

        if ($permission != null) {

            if (! $request->user()->can($permission)) {
                notify()->flash('Oops', 'error', [
                    'timer' => 5000,
                    'text' => 'Aquí pasó algo raro',
                ]);
                return redirect()->route('nosotros');
            }
        }


        return $next($request);
    }
}
