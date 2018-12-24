<?php

namespace App\Http\Middleware;

use Closure;

class MemberMiddleware
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
      if(!$request->user()) {
            abort(403, 'Unauthorized action.');
      } else if(!in_array($request->user()->role_id, [2,3,4])){
            abort(403, 'Unauthorized action.');
      }
      return $next($request);
    }
}
