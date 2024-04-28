<?php

namespace App\Repositories\Eloquent;

use App\DTO\CarDto;
use App\Models\Car;
use App\Repositories\CarRepositoryInterface;
use TimWassenburg\RepositoryGenerator\Repository\BaseRepository;

/**
 * Class CarRepository.
 */
class CarRepository implements CarRepositoryInterface
{
    /**
     * UserRepository constructor.
     *
     * @param Car $model
     */



     public function store(CarDto $carDto){
        $car = car::create($this->getarray($carDto));
        return abort(redirect()->route('operator.cars'));
     }

     
     private function getarray(CarDto $carDto){
         return [
          'registration_number' => $carDto->registration_number,
          'price_per_day' => $carDto->price_per_day,
          'avalability' => $carDto->avalability,
          'carburant' => $carDto->carburant,
          'image' => $carDto->image,
          'carDetail_id' => $carDto->carDetail_id,
          'category_id' => $carDto->category_id,
          'operator_id' => $carDto->operator_id,
         ];      
      }

      public function update(car $car, carDto $carDto){
         $car = car::find($car->id);
         $car->registration_number =  $carDto->registration_number;
         $car->price_per_day = $carDto->price_per_day;
         $car->availability = $carDto->avalability;
         $car->carburant = $carDto->carburant;
         $car->image = $carDto->image;
         $car->carDetail_id = $carDto->carDetail_id;
         $car->category_id = $carDto->category_id;
         $car->operator_id = $carDto->operator_id;

         $car->save();
         return abort(redirect()->route('operator.cars'));
     }
}
