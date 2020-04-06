<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{

    /**
     * Returns the profile index page
     * @return View
     */
    public function index(): View
    {
        $user = auth()->user();
        return view('user.index', compact('user'));
    }

    /**
     * Returns the edit page
     * @return View
     */
    public function edit(): View
    {
    	$user = auth()->user();
        return view('user.edit', compact('user'));
    }

    /**
     * [update description]
     * @param  UpdateUserRequest $request 
     * @param  User $user    
     * @return RedirectResponse
     */
    public function update(UpdateUserRequest $request, User $user): RedirectResponse
    {
        $user = auth()->user();
        $input = $request->except('password', 'confirm_password');

        if (! $request->filled('password')) {
            $user->fill($input)->save();

            return back()->with('success_message', 'Profile updated successfully!');
        }

		$user->password = bcrypt($request->password);
        $user->fill($input)->save();

        return back()->with('success_message', 'Profile (and password) updated successfully!');
    }
}
