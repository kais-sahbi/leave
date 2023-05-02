<?php

namespace App\Http\Middleware;

use App\Http\LinkPermissionTrait\permissionTrait;
use Closure;
use Illuminate\Http\Request;


class LinkPermission
{
    use permissionTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
        //Methode 1 :
    //isset pour ne pas afficher le msg de non existance dans la base de ['can-list']

       /*   for departement
       if (isset(auth()->user()->role->permission['name']['department']['can-list'])) {

            return $next($request);


        } else {
            abort(401);
        }*/
   //Methode 2 : on va ecrire le code dans permissionTrait pour l'organisation et puis on l'appel ici
    {
        $this->hasPermission();
        return $next($request);
    }

}

