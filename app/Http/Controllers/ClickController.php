<?php

namespace App\Http\Controllers;

use App\Package;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ClickController extends Controller
{
    public function index(Request $request)
    {

        $hash = md5($request->route('owner') . $request->route('package_name'));

        $package = Package::query()
            ->whereOwner($request->route('owner'))
            ->wherePackageName($request->route('package_name'))
            ->firstOrFail();

        $geoIp = geoip()->getLocation($request->server->get('REMOTE_ADDR'));

        if ($package) {
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
        }

        // TODO if NO $package then email James to tell him

        // TODO if NO $package then lets' run a check to see if the package does have Treeware then we can auto add it

        return redirect()->to('https://offset.earth/treeware?gift-trees&ref=' . $hash);

    }
}
