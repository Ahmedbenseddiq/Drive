<?php

namespace App\DTO;

use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;



class ReservationDto
{
 
    public function __construct(
        public string $start_date,
        public string $end_date,
        public string $client_id,){}


    public static function fromRequest(StoreReservationRequest $request): ReservationDto
    {
        // dd($request);
        $start_date = $request->validated()['start_date'];
        $end_date = $request->validated()['end_date'];
        $client_id = $request->validated()['client_id'];

        return new self($start_date, $end_date, $client_id);
    }
}   