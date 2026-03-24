<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Exceptions\JWTException;

class JwtMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();

            if (!$user) {
                return response()->json([
                    'error' => 'User tidak ditemukan'
                ], 404);
            }

        } catch (TokenExpiredException $e) {
            return response()->json([
                'error' => 'Token expired'
            ], 401);

        } catch (TokenInvalidException $e) {
            return response()->json([
                'error' => 'Token tidak valid'
            ], 401);

        } catch (JWTException $e) {
            return response()->json([
                'error' => 'Token tidak ditemukan'
            ], 401);
        }

        return $next($request);
    }
}