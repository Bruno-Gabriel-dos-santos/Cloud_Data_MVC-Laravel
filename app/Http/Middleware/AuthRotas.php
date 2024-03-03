<?php

namespace App\Http\Middleware;

use Closure;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use App\Models\usuario;
use App\Models\dados;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Session;


class AuthRotas
{
    
    public function handle(Request $request, Closure $next)
    {
        $nick=session('nick') ?? "";
        $auth=session('auth') ?? "";

        $usuario = usuario::where('nick',$nick)->where('autentificacao', $auth)->first();
        
        
        if ($usuario) {
            
            

            
            
        } else {

            return redirect('/');

        }
             

            return $next($request);
       
    }
}
