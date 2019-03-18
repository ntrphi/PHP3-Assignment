<?php
namespace App\Http\Middleware;
use Closure;
use Auth;
class CheckRole
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
        if(Auth::user()->role <= 1){
            return redirect(route('forbiden'));
        }
        return $next($request);
    }
    public function checkrole($request, Closure $next)
    {
        if(Auth::user()->role <= 2){
            return redirect(route('forbiden'));
        }
        return $next($request);
    }
}
