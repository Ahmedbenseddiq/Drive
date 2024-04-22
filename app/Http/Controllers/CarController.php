<?php

namespace App\Http\Controllers;

use App\Models\car;
use App\Http\Requests\StorecarRequest;
use App\Http\Requests\UpdatecarRequest;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('operator.car.cars');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('operator.car.addCar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorecarRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(car $car)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatecarRequest $request, car $car)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(car $car)
    {
        //
    }
}
