<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::domain(config('app.url'))->group(function () {
    Route::get('/', 'WelcomeController@index');
    Route::get('/packages/{page?}', 'PackageController@index');
    Route::get('/about', 'AboutController@index')->name('about');
});


Route::domain('click.' . config('app.url'))->group(function () {
    Route::get('/{owner}/{package_name}', [\App\Http\Controllers\ClickController::class, 'index'])->name('click');
});

