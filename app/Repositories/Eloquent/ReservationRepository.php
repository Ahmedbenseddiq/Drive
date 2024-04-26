<?php

namespace App\Repositories\Eloquent;

use App\Models\car;
use App\DTO\ReservationDto;
use App\Models\Reservation;
use App\Repositories\ReservationRepositoryInterface;
use TimWassenburg\RepositoryGenerator\Repository\BaseRepository;

/**
 * Class ReservationRepository.
 */
class ReservationRepository implements ReservationRepositoryInterface
{
    /**
     * UserRepository constructor.
     *
     * @param Reservation $model
     */


     public function store(ReservationDto $reservationDto, car $car){
        $data = $this->getarray() + ['car_id' => $car->id];
        $reservation = Reservation::create($data);
        return abort(redirect()->route('operator.reservations'));   
     }

     public function getarray(){
        return [
            'start_date' => request('start_date'),
            'end_date' => request('end_date'),
            'car_id' => request('car_id'),
            'client_id' => request('client_id'),
        ];
     }
}
