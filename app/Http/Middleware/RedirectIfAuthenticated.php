<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;
//   dd($guards);
        foreach ($guards as $guard) {
              
            if ($guard=='student' && Auth::guard($guard)->check()) {

                return redirect(RouteServiceProvider::STUDENTHOME);
            }

            if ($guard=='faculty' && Auth::guard($guard)->check()) {
                return redirect(RouteServiceProvider::FACULTYHOME);
            }

            if ($guard=='user' && Auth::guard($guard)->check()) {
                return redirect(RouteServiceProvider::USERHOME);
            }
        }
 
        return $next($request);
    }

    // public function handle(Request $request, Closure $next, $guard = null)
    // {
    //     // $guards = empty($guards) ? [null] : $guards;
 
    //     switch($guard){

    //         case 'admin': if (Auth::guard($guard)->check()){
    //             return redirect('/admin');
    //         }
    //         break;
    //         case 'student': if (Auth::guard($guard)->check()){
              
    //             return redirect('/student-login');
    //         }
    //         break;
    //         default: if (Auth::guard($guard)->check()){
    //             return redirect('/');
    //         }
    //         break;

                
    //     }
       


    //     // foreach ($guards as $guard) {
           
           
    //     //     if (Auth::guard($guard)->check()) {

    //     //     //    if($guard==='admin')
    //     //     //    return redirect()->route('admin.home');
    //     //         return redirect(RouteServiceProvider::USERHOME);
    //     //     }
    //     // }


    //     return $next($request);
    // }
}
