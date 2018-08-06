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
	if ($request->user() && ($request->user()->type != 'registered' && $request->user()->type !='admin'))
		{
			return redirect('/');
		}
		if($request->user()->banned==true)
		{
			return redirect('/');
		}
        return $next($request);
    }
}
