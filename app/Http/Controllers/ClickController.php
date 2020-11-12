<?php

namespace App\Http\Controllers;

use App\Jobs\Package\CreatePackageIfHasLicence;
use App\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ClickController extends Controller
{
    public function index(Request $request)
    {
        $owner = $request->route('owner', 'empty');
        $package_name = $request->route('package_name', 'empty');

        $package = Package::query()
            ->whereOwner($owner)
            ->wherePackageName($package_name)
            ->first();

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
                'timezone' => $geoIp['timezone'],
            ]);
        } else {
            // TODO if NO $package then email James to tell him

            // TODO if NO $package then lets' run a check to see if the package does have Treeware then we can auto add it
            dispatch(new CreatePackageIfHasLicence('https://github.com/' . $owner . '/' . $package_name));
        }

        return redirect()->to('https://ecologi.com/treeware?gift-trees&ref=' . md5(Str::lower($owner . '/' . $package_name)));
    }
}
