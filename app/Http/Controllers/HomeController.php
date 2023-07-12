<?php

namespace App\Http\Controllers;

use App\Models\Admin\Pages\Home\HomeBanner;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data['homeBanner'] = HomeBanner::firstOrFail();
        return view('frontend.pages.home.home', compact('data'));
    }
}
