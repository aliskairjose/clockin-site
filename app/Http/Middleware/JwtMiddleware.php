<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
// use JWTAuth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class JwtMiddleware extends BaseMiddleware
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
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
                return response()->json(
                  [
                    'isSuccess' => false,
                    'status' => 'Token is Invalid',
                    'code'   => 401
                  ]
                );
            } else {
                if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
                    return response()->json(
                      [
                        'isSuccess' => false,
                        'message' => 'Token is Expired',
                        'status'   => 401
                      ]
                    );
                } else {
                    return response()->json(
                      [
                        'isSuccess' => false,
                        'message'   => 'Authorization Token not found',
                        'status'    => 400,
                      ]
                    );
                }
            }
        }
        return $next($request);
    }
}
