<?php

namespace App\Http\Controllers;

use App\Package;

class WelcomeController extends Controller
{
    public function index() {

        $recent_packages_limit = 4;

        return view('welcome', [
            'recent_packages' => Package::orderBy('created_at', 'desc')->take($recent_packages_limit)->get(),
            'recent_packages_limit' => $recent_packages_limit
        ]);

    }
}
