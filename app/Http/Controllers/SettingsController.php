<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SettingsController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
    	$user = auth()->user();
        return view('settings.index', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user)
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
