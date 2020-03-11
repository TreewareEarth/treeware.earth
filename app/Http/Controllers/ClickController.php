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

        try {


            $package = Package::query()
                ->whereOwner($request->route('owner'))
                ->wherePackageName($request->route('package_name'))
                ->firstOrFail();

        } catch (ModelNotFoundException $e) {
            return view('notfound', [
                'owner' => $request->route('owner'),
                'package_name' => $request->route('package_name'),
            ]);
        }

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
