<?php

namespace App\Http\Controllers;

use App\Models\carInfo;
use App\Http\Requests\StorecarInfoRequest;
use App\Http\Requests\UpdatecarInfoRequest;

class CarInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('operator.carInfo.carInfo');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorecarInfoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(carInfo $carInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(carInfo $carInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatecarInfoRequest $request, carInfo $carInfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(carInfo $carInfo)
    {
        //
    }
}
