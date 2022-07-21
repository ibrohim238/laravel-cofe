<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\GeoService;
use Illuminate\Http\Request;
use function app;
use function response;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $addresses = app(GeoService::class)->get($request);

        response()->json($addresses);
    }

    public function select(Request $request)
    {
        $address = app(GeoService::class)->select($request);

        return response()->json($address);
    }
}
