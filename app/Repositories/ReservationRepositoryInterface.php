<?php

namespace App\Repositories;

use App\Models\car;
use App\DTO\ReservationDto;

interface ReservationRepositoryInterface
{
   public function store(ReservationDto $reservationDto, car $car);
}
