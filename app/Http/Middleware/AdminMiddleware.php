<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Foundation\Http\Middleware\Admin as Middleware;
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
         if (Auth::check() && Auth::user()->role=='admin') {
            
             return $next($request);
         }
         return redirect('/')->with('error', 'Access Denied');
     }
}