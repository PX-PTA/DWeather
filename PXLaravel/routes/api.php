<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Device;
use Carbon\Carbon;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/data', function () {
    
});

Route::get('/ping/{Device}', function (Device $Device) {
    $Device->last_online =  Carbon::now();
    $Device->save();
    
    return response(["device" => $Device, "Server" => true ])->header('Content-Type', 'text/html');
});
