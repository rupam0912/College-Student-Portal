<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class Admission
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
        if (Auth::check() && Auth::user()->role == 'admin') {
            return redirect('/admin');;
        }
        elseif (Auth::check() && Auth::user()->role == 'admission') {
            return $next($request);
        }
        elseif (Auth::check() && Auth::user()->role == 'exam') {
            return redirect('/exam');
        }
        elseif (Auth::check() && Auth::user()->role == 'placement') {
            return redirect('/placement');
        }
        elseif (Auth::check() && Auth::user()->role == 'student') {
            return redirect('/student');
        }
    }
}
