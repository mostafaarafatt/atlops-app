<?php

namespace App\Http\Controllers\Frontend\General;

use App\Http\Controllers\Controller;
use Laraeast\LaravelSettings\Facades\Settings;

class PagesController extends Controller
{
    public function aboutUs()
    {
        $aboutsUs = Settings::get('about_us');
        dd($aboutsUs);
        return view('frontend.general.about_us');
    }
    public function termsConditions()
    {
        return view('frontend.general.terms_conditions');
    }
}
