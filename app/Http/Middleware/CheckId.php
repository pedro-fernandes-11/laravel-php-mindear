<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckId
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $arr = ['Argentina', 'Brasil', 'Colômbia', 'Equador'];
        if(in_array($request->id, $arr)){
            dd("($request->id) Está disponível no array");
        }
        return $next($request);
    }
}
