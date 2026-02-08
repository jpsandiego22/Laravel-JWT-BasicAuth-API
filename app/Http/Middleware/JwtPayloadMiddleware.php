<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class JwtPayloadMiddleware
{
   
    public function handle(Request $request, Closure $next)
    {
        try {
            // Validate token & decode payload
            $payload = JWTAuth::parseToken()->getPayload();

            // Optional: attach payload to request
            $request->attributes->set('jwt_payload', $payload);

        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response()->json(['error' => 'Token expired'], 401);

        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json(['error' => 'Token invalid'], 401);

        } catch (JWTException $e) {
            return response()->json(['error' => 'Token missing'], 401);
        }

        return $next($request);
    }
}
