<?php

namespace App\Http\Controllers;

use App\Models\SensorData;
use Illuminate\Http\Request;
use App\DataTables\SensorDataDataTable;
use App\DataTables\SensorDataAnginDataTable;
use App\DataTables\SensorDataKelembapanDataTable;
use App\DataTables\SensorDataSuhuDataTable;

class SensorDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SensorDataDataTable $dataTable)
    {
        return $dataTable->render('data.suhu');
    }

    public function suhu(SensorDataSuhuDataTable $dataTable)
    {
        return $dataTable->render('device.suhu');
    }

    public function kelembapan(SensorDataKelembapanDataTable $dataTable)
    {
        return $dataTable->render('device.kelembapan');
    }

    public function angin(SensorDataAnginDataTable $dataTable)
    {
        return $dataTable->render('device.angin');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SensorData  $sensorData
     * @return \Illuminate\Http\Response
     */
    public function show(SensorData $sensorData)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SensorData  $sensorData
     * @return \Illuminate\Http\Response
     */
    public function edit(SensorData $sensorData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SensorData  $sensorData
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SensorData $sensorData)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SensorData  $sensorData
     * @return \Illuminate\Http\Response
     */
    public function destroy(SensorData $sensorData)
    {
        //
    }
}
