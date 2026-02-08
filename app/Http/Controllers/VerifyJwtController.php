<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class VerifyJwtController extends Controller
{
    public function verifyToken(Request $request)
    {
        try {
            $payload = JWTAuth::parseToken()->getPayload();

            return response()->json([
                'valid' => true,
                'client_id' => $payload->get('client_id'),
            ]);
    
        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response()->json(['error' => 'Token expired'], 401);
    
        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json(['error' => 'Token invalid'], 401);
    
        } catch (\Exception $e) {
            return response()->json(['error' => 'Token missing'], 401);
        }
    }
}




