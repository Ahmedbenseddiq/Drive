<?php

namespace App\DTO;

use App\Http\Requests\StorecategoryRequest;

class categoryDto
{
 
    public function __construct(
        public string $name,
        public string $image,){}


    public static function fromRequest(StorecategoryRequest $request): categoryDto
    {
        // dd($request);
        $name = $request->validated()['name'];
        $image = $request->validated()['image'];

        return new self($name, $image);
    }
}   