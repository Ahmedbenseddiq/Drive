<?php

namespace App\Http\Controllers;

use App\Models\car;
use App\Models\User;
use App\Models\category;
use App\Models\operator;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreoperatorRequest;
use App\Http\Requests\UpdateoperatorRequest;

class OperatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $operatorId = Auth::user()->operators()->first()->id;

        $reservations = Reservation::whereHas('car', function ($query) use ($operatorId) {
            $query->where('operator_id', $operatorId);
        })->get();

        $reservationCount = $reservations->count();
        $carCount = car::where('operator_id', $operatorId)->count();

        $categoryCount = category::whereHas('cars', function ($query) use ($operatorId) {
            $query->where('operator_id', $operatorId);
        })->count();

        $clientCount = Reservation::whereHas('car', function ($query) use ($operatorId) {
            $query->where('operator_id', $operatorId);
        })->distinct('client_id')->count('client_id');

        // dd($reservations);
        return view('operator.home', compact('reservations', 'reservationCount', 'carCount', 'categoryCount', 'clientCount'));
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
    public function store(StoreoperatorRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(operator $operator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(operator $operator)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateoperatorRequest $request, operator $operator)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(operator $operator)
    {
        //
    }
}
