<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class Faculty
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    
    public function handle(Request $request, Closure $next,$guard=null): Response
    {
        dd(Auth::guard('faculty')->check());
         
        if (!Auth::guard('faculty')->check()) {
           return redirect('/admin/login');
        }
        return $next($request);
    }
}
