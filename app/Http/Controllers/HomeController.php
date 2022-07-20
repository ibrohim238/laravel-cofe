<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\GeoService;
use Illuminate\Http\Request;
use function app;
use function response;

class HomeController extends Controller
{
    public function form()
    {
        return view('form');
    }

    public function suggest(Request $request)
    {
        $addresses = app(GeoService::class)->get($request);

        return view('list', compact('addresses'));
    }

    public function select(Request $request)
    {
        return app(GeoService::class)->select($request);
    }
}
