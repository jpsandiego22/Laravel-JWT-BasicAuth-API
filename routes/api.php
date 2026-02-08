<?php

use App\Http\Controllers\JwtController;
use App\Http\Controllers\VerifyJwtController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('v1/jwt/token', [JwtController::class, 'token_request']);
Route::post('v1/jwt/verification', [VerifyJwtController::class, 'verifyToken']);

Route::middleware('jwt.payload')->get('/verify', function (Request $request) {
    return response()->json([
        'status' => 'Token is valid',
        'client_id' => $request->get('jwt_payload')['client_id'],
    ]);
});