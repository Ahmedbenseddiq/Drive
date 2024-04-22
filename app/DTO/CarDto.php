<?php

namespace App\DTO;

use App\Http\Requests\StorecarRequest;
use App\Http\Requests\UpdatecarRequest;



class carInfoDto
{
 
    public function __construct(
        public string $registraion_number,
        public string $price_per_day,
        public string $avalibility,
        public string $carburant,
        public string $carDetail_id,
        public string $category_id,
        public string $operator_id,){}


    public static function fromRequest(StorecarRequest | UpdatecarRequest $request): carInfoDto
    {
        // dd($request);
        $registraion_number = $request->validated()['registraion_number'];
        $price_per_day = $request->validated()['price_per_day'];
        $avalibility = $request->validated()['avalibility'];
        $carburant = $request->validated()['carburant'];
        $carDetail_id = $request->validated()['carDetail_id'];
        $category_id = $request->validated()['category_id'];
        $operator_id = $request->validated()['operator_id'];


        return new self($registraion_number, $price_per_day, $avalibility, $carburant, $carDetail_id, $category_id, $operator_id);
    }
}   