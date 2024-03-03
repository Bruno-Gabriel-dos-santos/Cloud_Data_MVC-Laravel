<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\usuario;

class VerificaUsuario
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $nick= $request->route('nick');

        if($nick){

            $usuario = usuario::where('nick', $nick)
            ->first();
        
            if (!$usuario) {
              
                return redirect()->route('semusuario');
            }

        }

        return $next($request);
    }
}
