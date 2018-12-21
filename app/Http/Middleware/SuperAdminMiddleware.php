<?php

namespace App\Http\Middleware;

use Closure;
use Response;
class SuperAdminMiddleware
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
        if ($request->user() && $request->user()->is_owner != 1)

        {

        return new Response(abort(404));

        }

        return $next($request);
    }
}
