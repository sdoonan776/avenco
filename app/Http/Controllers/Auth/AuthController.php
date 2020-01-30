<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\AuthLoginRequest;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'logout']]);
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
     * @return \Illuminate\Http\Response
     */
    public function login(AuthLoginRequest $request): Response
    {
        $credentials = $request->only('email', 'password');

        if ($request->rememberMe) {
            $this->guard()->factory()->setTTL(30 * 24 * 60);
        }

        if ($token = $this->guard()->attempt($credentials)) {
            $request->session()->flash('login.success', $login->success);

            $tokenResponse = $this->respondWithToken($token);

            return $tokenResponse . redirect()->route('pages.home');
        }

        return response()->json(['error' => 'Unauthorized'], 401);

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
     * @return \Illuminate\Contracts\Auth\Guard
     */
    public function guard(): Guard
    {
        return Auth::guard('api');
    }

    
}
