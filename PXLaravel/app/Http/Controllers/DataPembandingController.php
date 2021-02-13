<?php

namespace App\Http\Controllers;

use App\Models\DataPembanding;
use Illuminate\Http\Request;
use App\Imports\DataPembandingImport;
use Maatwebsite\Excel\Facades\Excel;

class DataPembandingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    
    public function import() 
    {
        Excel::import(new DataPembandingImport, 'dataSensor.xlsx');
        
        return redirect('/')->with('success', 'All good!');
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
     * @param  \App\Models\DataPembanding  $dataPembanding
     * @return \Illuminate\Http\Response
     */
    public function show(DataPembanding $dataPembanding)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataPembanding  $dataPembanding
     * @return \Illuminate\Http\Response
     */
    public function edit(DataPembanding $dataPembanding)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataPembanding  $dataPembanding
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataPembanding $dataPembanding)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataPembanding  $dataPembanding
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataPembanding $dataPembanding)
    {
        //
    }
}
