<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth as FacadesJWTAuth;
use Tymon\JWTAuth\JWTAuth as JWTAuthJWTAuth;

class jwtauth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try{
        $user=FacadesJWTAuth::parseToken()->authenticate();
      
        }
        catch(\Exception $e)
        {
            if($e instanceof TokenExpiredException)
            {
               
                return response()->json(['success'=>'false','status'=>' expired'],401);
            }
            elseif($e instanceof TokenInvalidException)
            {
                return response()->json(['success'=>'false','message'=>'token invalid'],401);
            }
            else{
                return response()->json(['success'=>'false','message'=>'token not found'],401);
            }
        }
        return $next($request);
    }
}
