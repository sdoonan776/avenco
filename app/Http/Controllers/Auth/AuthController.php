<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthLoginRequest;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{
    // use AuthenticatesUsers;

    protected $redirectTo = 'page.home';

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
     * @return   JsonResponse 
     */
    public function login(AuthLoginRequest $request): JsonResponse
    {
        $params = $request->only('email', 'password');

        $username = $params['email'];
        $password = $params['password'];

        if (Auth::attempt(['email' => $username, 'password' => $password])) {
            $user = Auth::user();
            $success['token'] = $user->createToken('Laravel Password Grant Client', [])->accessToken;
            return response()->json(['success' => $success], 200);
        }
        return response()->json(['error' => 'Invalid username or Password'], 401);
    }

    /**
     * Get the authenticated User
     *
     * @param  Request $request
     * @return  User
     */
    public function user(Request $request): User
    {
        return $request->user();
    }

     /**
     * Log the user out (Invalidate the token)
     *
     * @param  Request $request
     * @return RedirectResponse
     */
    public function logout(Request $request): RedirectResponse
    {
        $token = $request->user()->token();
        $token->revoke();

        $response = 'You have been succesfully logged out!';
        return redirectTo('pages.home')->with($response);
    }    
}
