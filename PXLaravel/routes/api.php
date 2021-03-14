<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Device;
use App\Models\SensorData;
use App\Models\DataHasil;
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
    $now = Carbon::now();

    $Device->last_online =  $now;
    $Device->save();

    $totalDataHasil = DataHasil::count();

    if($totalDataHasil > 3){
        $FtSuhu = DataHasil::where('sensor_id',3)->orderBy('created_at', 'desc')->first()->data;
        $FtWind = DataHasil::where('sensor_id',1)->orderBy('created_at', 'desc')->first()->data;
        $FtHumi = DataHasil::where('sensor_id',2)->orderBy('created_at', 'desc')->first()->data;
    }else{
        $FtSuhu = 0;
        $FtWind = 0;
        $FtHumi = 0;
    }

    return response(true.";".$now->month.";".$FtSuhu.";".$FtWind.";".$FtHumi)->header('Content-Type', 'text/html');
});

Route::post('/data/sensor/{Device}', function (Device $Device,Request $request) {
    $now = Carbon::now();

    if( $request->humidity){ 

       $newDataSensor = new SensorData;
       $newDataSensor->data = $request->humidity;
       $newDataSensor->waktu = $now;
       $newDataSensor->sensor_id = 2;
       $newDataSensor->save();  
    }

    if($request->windCurrent){
        $newDataSensor = new SensorData;
        $newDataSensor->data = $request->windCurrent;
        $newDataSensor->waktu = $now;
        $newDataSensor->sensor_id = 1;
        $newDataSensor->save(); 
    }

    if($request->temperaturDsb){
        $newDataSensor = new SensorData;
        $newDataSensor->data = $request->temperaturDsb;
        $newDataSensor->waktu = $now;
        $newDataSensor->sensor_id = 3;
        $newDataSensor->save(); 
    }

    if($request->HasilExpSuhu){
        $newDataSensor = new DataHasil;
        $newDataSensor->data = $request->HasilExpSuhu;
        $newDataSensor->waktu = $now;
        $newDataSensor->sensor_id = 3;
        $newDataSensor->save();     
        if($newDataSensor->save()){
         $client = new \GuzzleHttp\Client();
         $response = $client->put('http://blynk-cloud.com/U4z0hqzAUS7-BJ3bFFvT9or9nyQgMor5/update/V0',[
             'headers' => [
                 "Content-Type" => "application/json"
             ],
             'body' => '['.$request->HasilExpSuhu.']'
         ]);
        }             
    }

    if($request->HasilExpWind){
        $newDataSensor = new DataHasil;
        $newDataSensor->data = $request->HasilExpWind;
        $newDataSensor->waktu = $now;
        $newDataSensor->sensor_id = 1;
        $newDataSensor->save(); 
        if($newDataSensor->save()){
         $client = new \GuzzleHttp\Client();
         $response = $client->put('http://blynk-cloud.com/U4z0hqzAUS7-BJ3bFFvT9or9nyQgMor5/update/V1',[
             'headers' => [
                 "Content-Type" => "application/json"
             ],
             'body' => '['.$request->HasilExpWind.']'
         ]);
        }         
    }

    if($request->HasilExpHum){
        $newDataSensor = new DataHasil;
        $newDataSensor->data = $request->HasilExpHum;
        $newDataSensor->waktu = $now;
        $newDataSensor->sensor_id = 2;
        $newDataSensor->save();   
        if($newDataSensor->save()){
         $client = new \GuzzleHttp\Client();
         $response = $client->put('http://blynk-cloud.com/U4z0hqzAUS7-BJ3bFFvT9or9nyQgMor5/update/V2',[
             'headers' => [
                 "Content-Type" => "application/json"
             ],
             'body' => '['.$request->HasilExpHum.']'
         ]);
        }          
    }

    $Device->last_online =  Carbon::now();
    $Device->save();

    $FtSuhu = DataHasil::where('sensor_id',3)->orderBy('created_at', 'desc')->first()->data;
    $FtWind = DataHasil::where('sensor_id',1)->orderBy('created_at', 'desc')->first()->data;
    $FtHumi = DataHasil::where('sensor_id',2)->orderBy('created_at', 'desc')->first()->data;

    
    return response(true.";".$now->month.";".$FtSuhu.";".$FtWind.";".$FtHumi)->header('Content-Type', 'text/html');
});

