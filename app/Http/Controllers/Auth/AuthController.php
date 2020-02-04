<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthLoginRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Laravel\Passport\PersonalAccessTokenResult;
use Laravel\Passport\Token;

class AuthController extends Controller
{

    protected $redirectTo = '/';

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
     * @return Response
     */
    public function login(AuthLoginRequest $request): Response
    {
        $params = $request->only('email', 'password');

        $username = $params['email'];
        $password = $params['password'];

        if (\Auth::attempt(['email' => $username, 'password' => $password])) {
            $user = \Auth::user();
            $token = $user->createToken('Laravel Password Grant Client')->accessToken;
            $response = ['token' => $token];
            return response($response, 200);
        } else {
            $response = "Invalid username or password";
            return response($response, 442);
        }

        return response()->json(['error' => 'Invalid username or Password']);
    }

    /**
     * Get the authenticated User
     *
     * @param  Request $request
     * @return  Token
     */
    public function user(Request $request)
    {
        return $request->user();
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh(): JsonResponse
    {
       
    }

     /**
     * Log the user out (Invalidate the token)
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(): JsonResponse
    {
        $token = $request->user()->token();
        $token->revoke();

        $response = 'You have been succesfully logged out!';
        return response($response, 200);
    }
    
}
