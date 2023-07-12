<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ImageUpdateRequest;
use App\Http\Requests\Admin\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;


class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('admin.profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());
        try {
            if ($request->user()->isDirty('email')) {
                $request->user()->email_verified_at = null;
            }
            $request->user()->save();
            $notification = array(
                'message' => 'Info updated successfully',
                'alert-type' => 'success',
            );
        } catch (\Exception $e) {
            Log::error('Profile info update failed: ' . $e->getMessage());
            return Redirect::route('profile.edit')->with('error', 'Failed to update profile info.');
        }
        return Redirect::route('profile.edit')->with('status', 'profile-updated')->with($notification);
    }

    /**
     * Update the user's profile avatar.
     */
    public function upload(ImageUpdateRequest $request): RedirectResponse
    {
        $request->validated();
        $user = $request->user();
        $image = $request->file('image');
        if ($image) {
            try {
                //$filename = time() . $image->getClientOriginalName();
                $filename = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
                $image->move(public_path(env('USER_AVATAR_PATH')), $filename);
                $user->avatar = $filename;
                $user->save();
                $notification = array(
                    'message' => 'Image updated successfully',
                    'alert-type' => 'success',
                );
            } catch (\Exception $e) {
                Log::error('Avatar upload failed: ' . $e->getMessage());
                return Redirect::route('profile.edit')->with('error', 'Failed to upload avatar.');
            }
        }
        return Redirect::route('profile.edit')->with('status', 'avatar-updated')->with($notification);
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
        if ($user) {
            try {
                Auth::logout();
                $user->delete();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
            } catch (Exception $e) {
                Log::error('Delete user account failed: ' . $e->getMessage());
                return Redirect::route('profile.edit')->with('error', 'Failed to delete user account.');
            }
        }
        return Redirect::to('/');
    }
}
