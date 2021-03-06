<?php

namespace App\Http\Middleware;

use Closure;

class admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      if (Auth::guard($guard)->check() ) {
        if(Auth::user()->type_id == 2)
        {
          return redirect('/admin/home');
        }else {
          return $next($request);
        }
      }

      return $next($request);
    }
    }
}
