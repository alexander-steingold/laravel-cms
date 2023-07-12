<?php


namespace App\Http\Controllers\Admin\Pages\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ImageUpdateRequest;
use App\Http\Requests\Admin\Pages\Home\Banner\BannerUpdateRequest;
use App\Models\Admin\Pages\Home\HomeBanner;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Image;


class HomeIntroController extends Controller
{
    /**
     * Display edit form.
     */
    public function edit(Request $request): View
    {
        $data = HomeBanner::firstOrFail();
        return view('admin.pages/home.banner.edit', compact('data'));
    }

    /**
     * Update the user's profile information.
     */
    public function update(BannerUpdateRequest $request): RedirectResponse
    {
        $data = HomeBanner::firstOrFail();
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
            return Redirect::route('home_intro.edit')->with('error', 'Failed update information');
        }
        return Redirect::route('home_intro.edit')->with('status', 'info-updated')->with($notification);
    }

    /**
     * Update image
     */
    public function upload(ImageUpdateRequest $request): RedirectResponse
    {
        $request->validated();
        $data = HomeBanner::firstOrFail();
        $image = $request->file('image');
        if ($image) {
            try {
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
            } catch (\Exception $e) {
                Log::error('Image upload failed: ' . $e->getMessage());
                return Redirect::route('home_intro.edit')->with('error', 'Failed to upload image.');
            }
        }
        return Redirect::route('home_intro.edit')->with('status', 'image-updated')->with($notification);
    }

}
