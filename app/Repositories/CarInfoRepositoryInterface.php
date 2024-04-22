<?php

namespace App\Repositories;

use App\DTO\CarInfoDto;
use App\Models\carDetail;

interface CarInfoRepositoryInterface
{
   public function store(CarInfoDto $carInfoDto);
   public function update(Cardetail $cardetail, CarInfoDto $carInfoDto);
}
