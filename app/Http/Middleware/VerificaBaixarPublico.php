<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerificaBaixarPublico
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {


    
        $nick=$request->input('nick');
        $nomedoarquivo=$request->input('nomearq');

        if($nick==null || $nomedoarquivo == null){
            return redirect('/');
        }
        return $next($request);
    }
}
