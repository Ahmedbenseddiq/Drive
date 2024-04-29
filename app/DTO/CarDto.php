<?php

namespace App\DTO;

use App\Http\Requests\StorecarRequest;
use App\Http\Requests\UpdatecarRequest;
use Illuminate\Http\UploadedFile;

class carDto
{
    public function __construct(
        public string $registration_number,
        public string $price_per_day,
        public string $availability,
        public string $carburant,
        public UploadedFile $image, 
        public string $carDetail_id,
        public string $category_id,
        public string $operator_id
    ) {}

    public static function fromRequest(StorecarRequest | UpdatecarRequest $request): carDto
    {
        $validatedData = $request->validated();

        return new self(
            $validatedData['registration_number'],
            $validatedData['price_per_day'],
            $validatedData['availability'],
            $validatedData['carburant'],
            $request->file('image'), 
            $validatedData['carDetail_id'],
            $validatedData['category_id'],
            $validatedData['operator_id']
        );
    }
}
