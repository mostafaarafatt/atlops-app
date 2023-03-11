<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;

class TestController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    public function test(Request $request)
    {
        Log::channel('messages')->info(print_r($request->all(), true));
    }
}
