<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthenticateController extends Controller
{
    /**
     * Return the user's access token.
     */
    public function authenticate(Request $request)
    {
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            $user = User::where('email', $request->input('email'))->first();

            return (new User($user))
                    ->additional(['meta' => [
                        'access_token' => $user->api_token
                    ]]);
        }

        return response()->json(['message' => 'This action is unauthorized.'], 401);
    }
}
