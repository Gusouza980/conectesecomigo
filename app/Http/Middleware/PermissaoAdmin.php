<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PermissaoAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(session()->get("usuario") && session()->get("usuario")["atividade"] == 0){
            return $next($request);
        }else{
            toastr()->error("Você não pode acessar essa página !");
            return redirect()->route("painel.index");
        }
        return $next($request);
    }
}
