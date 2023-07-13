<?php

namespace App\Http\Controllers;

use App\Models\Admin\InfoSection;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data['homeBanner'] = InfoSection::firstOrFail();
        return view('frontend.pages.home.home', compact('data'));
    }
}
