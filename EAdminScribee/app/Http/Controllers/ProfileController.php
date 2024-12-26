<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
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
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $data = $request->only(['name']);


        if ($request->hasFile('profile_picture')) {

            if ($user->profile_picture && Storage::exists('public/profile_pictures/' . $user->profile_picture)) {
                Storage::delete('public/profile_pictures/' . $user->profile_picture);
            }


            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $data['profile_picture'] = basename($path);
        }


        if ($request->hasFile('signature_picture')) {

            if ($user->signature_picture && Storage::exists('public/signature_pictures/' . $user->signature_picture)) {
                Storage::delete('public/signature_pictures/' . $user->signature_picture);
            }


            $path = $request->file('signature_picture')->store('signature_pictures', 'public');
            $data['signature_picture'] = basename($path);
        }


        if ($request->filled('current_password') && $request->filled('new_password')) {
            if (!Hash::check($request->input('current_password'), $user->password)) {
                return Redirect::route('profile.edit')->withErrors(['current_password' => 'Current password is incorrect.']);
            }
            $data['password'] = Hash::make($request->input('new_password'));
        }

        $user->update($data);

        return Redirect::route('profile.edit')->with('status', 'Profile updated successfully.');
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
