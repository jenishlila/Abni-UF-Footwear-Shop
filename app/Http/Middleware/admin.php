<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$admin)
    {
        // if(Auth::user()->roll=='1')
        // dd(Auth::user()->role);
       if(Auth::user()->role==$admin)
        {
            return $next($request);
        }
       
       else
        { 
            if(Auth::user()->role==1)
            {
                return redirect('admin/dashboard');
            }
            else
            {
                return redirect('/home');
            }
        // $hasRole=Auth::user()->role;

            // if (!$request->user()->hasRole()->role=='1')
            // {
                // dd($admin);
              
            // dd($userRoll);                    
            // return redirect('/Home');
        }
        // else{
        //     throw new \Exception("invalid",1);
        // }
        // elseif(!$userRoll =='1')
        // {
        //     return redirect('/Home');
        // }
        //     // dd($userRoll);
     
            // return $next($request);
            
        // return 'hiiii';
        }
}

