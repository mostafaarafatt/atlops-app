<?php

namespace App\Http\Controllers\Frontend\General;

use App\Http\Controllers\Controller;
use Modules\Blogs\Entities\Blog;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        return view('frontend.general.blogs', compact('blogs'));
    }
}
