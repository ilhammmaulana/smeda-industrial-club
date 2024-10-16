<?php

namespace App\Http\Controllers\WEB;

use App\Http\Requests\WEB\UpdatePasswordRequest;
use App\Http\Requests\WEB\UpdateProfileRequest;
use Illuminate\Validation\ValidationException;
use Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(UpdateProfileRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }
        $request->user()->save();

        return Redirect::route('profile.edit')->with('success', 'Profile successfully updated.');
    }
    public function updatePassword(UpdatePasswordRequest $request)
    {
        $input = $request->only('current_password', 'new_password', 'confirm_new_password');
        if (!Hash::check($input['current_password'], Auth::user()->password)) {
            throw ValidationException::withMessages([
                'current_password' => ['The current password does not match.'],
            ]);
        }
        Auth::user()->update(['password' => Hash::make($input['new_password'])]);
        return redirect()->route('profile.edit')->with('success', 'Password successfully updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);
        $user = $request->user();
        Auth::logout();
        $user->delete();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return Redirect::to('/');
    }
}
