<?php

namespace App\Http\Controllers;

use App\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Torann\GeoIP\GeoIP;

class ClickController extends Controller
{
    public function index(Request $request)
    {

        $package = Package::query()
            ->whereOwner($request->route('owner'))
            ->wherePackageName($request->route('package_name'))
            ->firstOrFail();

        $geoIp = geoip()->getLocation($request->server->get('REMOTE_ADDR'));

        $package->clicks()->create([
            'ip' => $request->server->get('REMOTE_ADDR'),
            'country_iso_code' => $geoIp['iso_code'],
            'country' => $geoIp['country'],
            'city' => Str::limit($geoIp['city'], 57),
            'state' => $geoIp['state'],
            'state_name' => $geoIp['state_name'],
            'postal_code' => $geoIp['postal_code'],
            'latitude' => $geoIp['lat'],
            'longitude' => $geoIp['lon'],
            'timezone' => $geoIp['timezone']
        ]);

        $hash = md5($package->owner . $package->package_name);

        return redirect()->to('https://offset.earth/treeware?gift-trees&ref=' . $hash);

    }
}
