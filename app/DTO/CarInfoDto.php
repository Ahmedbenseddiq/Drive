<?php

namespace App\DTO;

use App\Http\Requests\StorecarInfoRequest;
use App\Http\Requests\UpdatecarInfoRequest;



class carInfoDto
{
 
    public function __construct(
        public string $brand,
        public string $model,){}


    public static function fromRequest(StorecarInfoRequest | UpdatecarInfoRequest $request): carInfoDto
    {
        // dd($request);
        $brand = $request->validated()['brand'];
        $model = $request->validated()['model'];

        return new self($brand, $model);
    }
}   