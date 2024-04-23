<?php

namespace App\Http\Controllers;

use App\DTO\CarInfoDto;
use App\Models\carDetail;
use App\Http\Requests\StorecarInfoRequest;
use App\Http\Requests\UpdatecarInfoRequest;
use App\Repositories\CarInfoRepositoryInterface;

class CarInfoController extends Controller
{

    public function __construct(public CarInfoRepositoryInterface $repository){

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carDetails = carDetail::all();
        return view('operator.carInfo.carInfo', ['carDetails' => $carDetails]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('operator.carInfo.addCarInfo');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorecarInfoRequest $StorecarInfoRequest)
    {
        $carInfoDto = CarInfoDto::fromRequest($StorecarInfoRequest);

        $this->repository->store($carInfoDto);
    }

    /**
     * Display the specified resource.
     */
    public function show(carDetail $carDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(carDetail $carDetail)
    {
        return view('operator.carInfo.editCarInfo',['carDetail' => $carDetail]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatecarInfoRequest $request, carDetail $carDetail)
    {
        $carInfoDto = CarInfoDto::fromRequest($request);
        $this->repository->update($carDetail, $carInfoDto);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(carDetail $carDetail)
    {
        $carDetail->delete();
        return abort(redirect(route('operator.carInfo')))->with('success','Car info deleted Successfully');
    }
}
