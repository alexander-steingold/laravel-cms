<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AboutUpdateRequest;
use App\Models\Admin\About;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Image;


class AboutController extends Controller
{
    /**
     * Display edit form.
     */
    public function edit(Request $request): View
    {
        $data = About::firstOrFail();
        return view('admin.pages.home.about.edit', compact('data'));
    }

    /**
     * Update the user's profile information.
     */
    public function update(AboutUpdateRequest $request): RedirectResponse
    {
        $data = About::firstOrFail();
        try {
            $data->fill($request->validated());
            $image = $request->file('image');
            if ($image) {
                //$filename = time() . $image->getClientOriginalName();
                $filename = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
                $img = Image::make($image);
                //$img->resize(500, 500);
//                $img->resize(500, 500, function ($constraint) {
//                    $constraint->aspectRatio();
//                    $constraint->upsize();
//                });
                $img->resize(null, 400, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save(public_path(env('HOMEPAGE_INTRO_BANNER_PATH')) . $filename);
                //$image->move(public_path(env('HOMEPAGE_INTRO_BANNER_PATH')), $filename);
                $data->image = $filename;
                $data->save();
                $notification = array(
                    'message' => 'Image updated successfully',
                    'alert-type' => 'success',
                );
            }
            $data->save();
            $notification = array(
                'message' => 'Page info updated successfully',
                'alert-type' => 'success',
            );
        } catch (\Exception $e) {
            Log::error('Homepage Intro Section update failed: ' . $e->getMessage());
            return Redirect::route('home_about.edit')->with('error', 'Failed update information');
        }
        return Redirect::route('home_about.edit')->with('status', 'info-updated')->with($notification);
    }
}
