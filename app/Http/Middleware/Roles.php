<?php

namespace simplePageProject_2\Http\Middleware;

use Closure;

class Roles{

   /**
    * Handle an incoming request.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \Closure  $next
    * @return mixed
    */
   public function handle($request, Closure $next){
      return redirect("/");
   }
}
