<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class NotFoundRedirect
{
    public function handle(Request $request, Closure $next)
    {
        // Obtém o nome da rota a partir da URL
        $routeName = Route::getRoutes()->match($request)->getName();

        
        // Verifica se a rota existe
        if (!Route::has($routeName)) {
            // Rota não encontrada, redireciona para uma página específica
            return redirect()->route('arquivos');
        }

        return $next($request);
    }
   
}
