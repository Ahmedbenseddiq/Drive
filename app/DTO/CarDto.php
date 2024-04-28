<?php

namespace App\DTO;

use App\Http\Requests\StorecarRequest;
use App\Http\Requests\UpdatecarRequest;



class carDto
{
 
    public function __construct(
        public string $registration_number,
        public string $price_per_day,
        public string $avalability,
        public string $carburant,
        public string $image,
        public string $carDetail_id,
        public string $category_id,
        public string $operator_id,){}


    public static function fromRequest(StorecarRequest | UpdatecarRequest $request): carDto
    {
        // dd($request);
        $registration_number = $request->validated()['registration_number'];
        $price_per_day = $request->validated()['price_per_day'];
        $avalability = $request->validated()['avalability'];
        $carburant = $request->validated()['carburant'];
        $image = $request->validated()['image'];
        $carDetail_id = $request->validated()['carDetail_id'];
        $category_id = $request->validated()['category_id'];
        $operator_id = $request->validated()['operator_id'];


        return new self($registration_number, $price_per_day, $avalability, $carburant, $image, $carDetail_id, $category_id, $operator_id);
    }
}   