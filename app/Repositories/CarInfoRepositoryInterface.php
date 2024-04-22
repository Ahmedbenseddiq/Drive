<?php

namespace App\Repositories;

use App\DTO\CarInfoDto;

interface CarInfoRepositoryInterface
{
   public function store(CarInfoDto $carInfoDto);
}
