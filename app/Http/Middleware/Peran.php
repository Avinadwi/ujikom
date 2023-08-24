<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;
use Illuminate\Support\Facades\Redirect;

class Peran
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $peran): Response
    {
       if(Auth::check()){
            $perans = explode('-',$peran);
            foreach ($perans as $group) {
                if(Auth::user()->role == $group ){
                    return $next($request);
                }
            }
        }
        //jika tidak ada hak aksesnya
        //dilempar ke halaman access denied
       return redirect::back();
     //return redirect('/access-denied');
    }
}
