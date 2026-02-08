<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class JwtController extends Controller
{
    public function token_request(Request $request)
    {
        $client = config('client');

        $client_id = $request->getUser();
        $client_secret = $request->getPassword();

        
        if (!$client_id || !$client_secret) {
            return response()->json(['error' => 'Missing Basic Auth credentials'], 400);
        }

         // Validate credentials
        if ($client_id !== $client['id'] || $client_secret !== $client['secret']) 
        {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }

        $user = new User($client_id, $client_secret);
        
       
        $token = JWTAuth::fromUser($user);
        
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in'   => JWTAuth::factory()->getTTL() * 60
        ]);
       
    }
}
