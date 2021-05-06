<?php

namespace App\Http\Controllers;

use App\Jobs\Package\CreatePackageIfHasLicence;
use App\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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


        if ($package) {
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
                'timezone' => $geoIp['timezone'],
            ]);

            return redirect()->to('https://ecologi.com/treeware?gift-trees&ref=' . md5(Str::lower($owner . '/' . $package_name)));
        }

        throw new NotFoundHttpException("The package '$owner/$package_name' is not registered with treeware.earth");

    }
}
