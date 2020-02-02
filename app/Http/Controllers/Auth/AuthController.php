<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthLoginRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Tymon\JWTAuth\JWTGuard;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['index', 'login', 'logout']]);
    }

    /**
     * @return \Illuminate\View\View;
     */
    public function index(): View
    {
        return view('auth.login');
    }

    /**
     * @param \App\Http\Requests\AuthLoginRequest $request
     * @return JsonResponse
 */
    public function login(AuthLoginRequest $request): JsonResponse
    {
        $credentials = $request->only('email', 'password');

        if ($request->rememberMe) {
            $this->guard()->factory()->setTTL(30 * 24 * 60);
        }
        try {
            if (!$token = $this->guard()->attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch(JWTException $e){
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        
        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function user(): JsonResponse
    {
        return response()->json($this->guard()->user());
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh(): JsonResponse
    {
        return $this->respondWithToken($this->guard()->refresh());
    }

     /**
     * Log the user out (Invalidate the token)
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(): JsonResponse
    {
         $this->guard()->logout();
        return response()->json(['message' => 'Successfully logged out']);   
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token): JsonResponse
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $this->guard()->factory()->getTTL() * 60
        ])
        ->header('Authorization', $token);
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return JWTGuard
     */
    public function guard(): JWTGuard
    {
        return Auth::guard('api');
    }

    
}
