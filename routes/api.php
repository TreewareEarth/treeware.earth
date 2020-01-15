<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/**********************************************************************************
 * add package
 */
Route::post('/package', 'Api\PackageController@store');
Route::get('/package/{page?}/{limit?}', 'Api\PackageController@index');

