<?php

namespace App\Http\Controllers;

use App\Http\Requests\AvatarUpdateRequest;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('admin.profile.manage', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {

        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();
        $notification = array(
            'message' => 'Profile updated successfully',
            'alert-type' => 'success',
        );
        return Redirect::route('profile.edit')->with('status', 'profile-updated')->with($notification);
    }

    /**
     * Update the user's profile avatar.
     */
    public function upload(AvatarUpdateRequest $request): RedirectResponse
    {
        $request->validated();
        $user = $request->user();
        $avatar = $request->file('avatar');

        // Check if a new avatar was uploaded
        if ($avatar) {
            try {
                // Generate a unique filename for the avatar
                $filename = time() . $avatar->getClientOriginalName();

                // Store the uploaded file with the same name in the desired directory
                $path = $avatar->move(public_path('backend/assets/images/users'), $filename);

                // Update the user's avatar path
                $user->avatar = $filename;
                $user->save();

                return Redirect::route('profile.edit')->with('status', 'avatar-updated');
            } catch (\Exception $e) {
                // Handle the exception or error occurred during the upload
                // For example, you can log the error and display a custom error message
                Log::error('Avatar upload failed: ' . $e->getMessage());
                return Redirect::route('profile.edit')->with('error', 'Failed to upload avatar.');
            }
        }


        return Redirect::route('profile.edit')->with('status', 'avatar-updated');
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
