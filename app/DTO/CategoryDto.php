<?php

namespace App\DTO;

use App\Http\Requests\StorecategoryRequest;
use App\Http\Requests\UpdatecategoryRequest;
use Illuminate\Http\UploadedFile;

class categoryDto
{
    public function __construct(
        public string $name,
        public UploadedFile $image 
    ) {}

    public static function fromRequest(StorecategoryRequest | UpdatecategoryRequest $request): categoryDto
    {
        $name = $request->validated()['name'];
        $image = $request->file('image'); 

        return new self($name, $image);
    }
}
