<?php

namespace App\Http\Controllers;

use App\DTO\CarDto;
use App\Models\car;
use App\Models\category;
use App\Models\carDetail;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorecarRequest;
use App\Http\Requests\UpdatecarRequest;
use App\Repositories\CarRepositoryInterface;

class CarController extends Controller
{

    public function __construct(public CarRepositoryInterface $repository){

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::all();
        // dd($cars);
        return view('operator.car.cars', ['cars' => $cars]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // dd(Auth::user()->operators()->get());
        $operatorId = Auth::user()->operators()->first()->id;
        // dd($user);
        $categories = category::all();
        $carDetails = carDetail::all();
        
        return view('operator.car.addCar', compact('operatorId', 'categories', 'carDetails'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorecarRequest $StoreCarRequest)
    {
        $carDto = CarDto::fromRequest($StoreCarRequest);

        $this->repository->store($carDto);
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
        $car->delete();
        return abort(redirect(route('operator.cars')))->with('success','Car deleted Successfully');
    }
}
