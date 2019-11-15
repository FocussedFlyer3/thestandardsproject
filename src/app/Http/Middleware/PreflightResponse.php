<?php
namespace App\Http\Middleware;
use Closure;
class PreflightResponse
{
    /**
    * Handle an incoming "OPTIONS" request send by browser.
    *
    * @param \Illuminate\Http\Request $request
    * @param \Closure $next
    * @return mixed
    */
    public function handle($request, Closure $next )
    {
        if ($request->getMethod() === "OPTIONS") {
            return response('');
        }

        return $next($request);
     }
 }