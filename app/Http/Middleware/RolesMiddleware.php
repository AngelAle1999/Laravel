<?php



namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class RolesMiddleware{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $role){

        if(Auth::user()){
            $rol_id=Auth::user()->id_rol;
            $roles = explode("-", $role);
            if(in_array($rol_id, $roles) == false) {
                return Redirect::to('/');
            }
        }else{
          return Redirect::to('/');
        }

        return $next($request);
    }
}


 ?>