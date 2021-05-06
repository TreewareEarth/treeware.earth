<?php

namespace App\Http\Controllers;

use App\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ClickController extends Controller
{
    public function index(Request $request)
    {
        $owner        = $request->route('owner', 'empty');
        $package_name = $request->route('package_name', 'empty');

        $package = Package::query()
            ->whereOwner($owner)
            ->wherePackageName($package_name)
            ->first();


        if ($package instanceof Package) {

            $this->trackClick($package, $request);

            return view('plant')->with([
                'package'      => $package,
                'checkout_url' => $this->getCheckoutUrl($package),
            ]);
        }

        throw new NotFoundHttpException("The package '$owner/$package_name' is not registered with treeware.earth");
    }

    private function getCheckoutUrl(Package $package): string
    {
        $ref = md5(Str::lower($package->owner . '/' . $package->package_name));

        return 'https://ecologi.com/treeware?gift-trees&ref=' . $ref;
    }

    private function trackClick(Package $package, Request $request): bool
    {
        $remoteAddr = $request->server->get('REMOTE_ADDR');
        $cacheKey = md5($package->package_name . $remoteAddr);

        // Prevent click cheating
        if (cache()->has($cacheKey)) {
            return false;
        }

        $geoIp = geoip()->getLocation($remoteAddr);
        $package->clicks()->create([
            'ip'               => $remoteAddr,
            'country_iso_code' => $geoIp['iso_code'],
            'country'          => $geoIp['country'],
            'city'             => Str::limit($geoIp['city'], 57),
            'state'            => $geoIp['state'],
            'state_name'       => $geoIp['state_name'],
            'postal_code'      => $geoIp['postal_code'],
            'latitude'         => $geoIp['lat'],
            'longitude'        => $geoIp['lon'],
            'timezone'         => $geoIp['timezone'],
        ]);

        // Remember the click
        cache()->set($cacheKey, '1', 600);

        return true;

    }
}
