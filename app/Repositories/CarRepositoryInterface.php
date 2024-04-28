<?php

namespace App\Repositories;

use App\DTO\CarDto;
use App\Models\car;

interface CarRepositoryInterface
{
   public function store(CarDto $carDto);
   public function update(car $car, carDto $carDto);
}
