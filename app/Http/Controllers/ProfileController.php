<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
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
        $validatedData = $request->validated();

        // Allow updating all new fields along with username and email
        $request->user()->fill([
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'first_name' => $validatedData['first_name'] ?? null,
            'last_name' => $validatedData['last_name'] ?? null,
            'contact_number' => $validatedData['contact_number'] ?? null,
            'line_address_1' => $validatedData['line_address_1'] ?? null,
            'line_address_2' => $validatedData['line_address_2'] ?? null,
            'barangay' => $validatedData['barangay'] ?? null,
            'municipality' => $validatedData['municipality'] ?? null,
            'city' => $validatedData['city'] ?? null,
            'postal_code' => $validatedData['postal_code'] ?? null,
        ]);

        // Check if email was modified to reset email verification
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
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
