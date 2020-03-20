<?php

namespace App\Http\Controllers\Api;

use App\Actions\Package\CreatePackageAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Package\ValidatePackageRequest;
use App\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index(Request $request, $page_no = 0, $limit = 4)
    {
        $pagination_start = ($page_no * $limit) ?? 0;

        return [
            'total_packages' => Package::count(),
            'packages' => Package::withCount('clicks')->orderBy('created_at', 'desc')->skip($pagination_start)->take($limit)->get(),
        ];
    }

    public function store(ValidatePackageRequest $request)
    {
        return (new CreatePackageAction())->execute($request->get('package_url'));
    }
}
