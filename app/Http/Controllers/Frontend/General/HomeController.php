<?php

namespace App\Http\Controllers\Frontend\General;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Sliders\Entities\Slider;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sliders = Slider::query()->get();
        return view('frontend.general.home',compact('sliders'));
    }
}
