<?php

namespace simplePageProject_2\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class IsAdmin{

   /**
    * Handle an incoming request.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \Closure  $next
    * @return mixed
    */
   public function handle($request, Closure $next){
      return (Auth::check() && Auth::user()->isAdmin()) ? $next($request) : redirect("/home");
   }
}
