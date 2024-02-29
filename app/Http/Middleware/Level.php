<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Level
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $levels)
    {   
        if(auth()->user()->level >= $levels) {
            if(auth()->user()->level == 1 && $request->is('request/*'))return response()->json(['You do not have permission to access for this page.']);
            if(auth()->user()->level != 1 && $request->is('monitoring/*'))return response()->json(['You do not have permission to access for this page.']);
            return $next($request);
        }
        return response()->json(['You do not have permission to access for this page.']);
        // return response()->view('errors.check-permission'); 
    }
}
