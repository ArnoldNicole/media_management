<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
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
       if (Auth::check()) {
            //dd(auth()->user()->isAdmin);
           if (auth()->user()->isAdmin!='no') {
                      return $next($request);
                  }else{
                    return redirect('dashboard'); 
                  }
       }else{
        return redirect('/login');
       }
    }
}
