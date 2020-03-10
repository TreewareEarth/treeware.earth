<?php

namespace App\Http\Controllers;

use App\Package;
use Illuminate\Http\Request;

class ClickController extends Controller
{
    public function index(Request $request)
    {

        $package = Package::query()
            ->whereOwner($request->route('owner'))
            ->wherePackageName($request->route('package_name'))
            ->firstOrFail();

        $package->clicks()->create();

        $hash = md5($package->owner . $package->package_name);

        return redirect()->to('https://offset.earth/treeware?gift-trees&ref=' . $hash);

    }
}
