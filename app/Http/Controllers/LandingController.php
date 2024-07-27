<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        return view('landing.pages.home');
    }

    public function about_us()
    {
        return view('landing.pages.about-us');
    }

    public function our_collections()
    {
        return view('landing.pages.our-collections.index');
    }

    public function show_collections($type)
    {
        return view('landing.pages.our-collections.lists', compact('type'));
    }

    public function show_collection_detail($slug)
    {
        return view('landing.pages.our-collections.show-detail', compact('slug'));
    }
}
