<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataHasilController;
use App\Http\Controllers\SensorDataController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\SensorController;

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

Route::get('/', function () {
    return redirect("login");
});


Route::prefix('data')->group(function () {
    Route::get('/hasil', [DataHasilController::class, 'index'])->name('dataHasil.index');
    Route::get('/suhu', [SensorDataController::class, 'index'])->name('datum.suhu');
    Route::get('/angin', [SensorDataController::class, 'index'])->name('datum.angin');
    Route::get('/kelembapan', [SensorDataController::class, 'index'])->name('datum.kelembapan');
});

Route::prefix('devices')->group(function () {
    Route::get('/hasil', [DeviceController::class, 'index'])->name('device.index');
    Route::get('/suhu', [SensorController::class, 'suhu'])->name('sensor.suhu');
    Route::get('/angin', [SensorController::class, 'angin'])->name('sensor.angin');
    Route::get('/kelembapan', [SensorController::class, 'kelembapan'])->name('sensor.kelembapan');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
