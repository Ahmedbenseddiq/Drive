<?php

namespace App\Repositories;

use App\DTO\CarDto;

interface CarRepositoryInterface
{
   public function store(CarDto $carDto);
}
