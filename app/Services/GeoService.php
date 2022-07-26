<?php

namespace App\Services;

use App\Clients\DaDataClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Location\Coordinate;
use Location\Distance\Vincenty;

class GeoService
{
    public Coordinate $coordinate1;

    public function __construct()
    {
        $this->coordinate1 = app(Coordinate::class, [
            'lat' => 55.662882,
            'lng' => 37.485610
        ]);
    }

    public function get(Request $request)
    {
        $addresses = app(DaDataClient::class)
            ->suggest('address', $request->get('address'));

        Cache::put('addresses', $addresses, 900);

        return $addresses;
    }

    public function select(Request $request): float
    {
        $addresses = Cache::get('addresses');
        $select = $request->get('address');

        $lat = $addresses[$select]['data']['geo_lat'];
        $lng = $addresses[$select]['data']['geo_lon'];

        $coordinate2 = app(Coordinate::class, [
            'lat' => $lat,
            'lng' => $lng,
        ]);

        return app(Vincenty::class)->getDistance($this->coordinate1, $coordinate2);
    }
}