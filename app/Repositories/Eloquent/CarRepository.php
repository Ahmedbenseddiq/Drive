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
      $fileName = pathinfo($carDto->image->getClientOriginalName(), PATHINFO_FILENAME);
      $extension = pathinfo($carDto->image->getClientOriginalName(), PATHINFO_EXTENSION);
      $fullFileName = $fileName . "-" . time() . '.' . $carDto->image->getClientOriginalExtension();
  
      $destinationPath = './assets/uploads/';
  
      $carDto->image->move(public_path($destinationPath), $fullFileName);
      $data = $this->getarray($carDto) + ['image' => $fullFileName];
  
      $car = Car::create($data);
      
      return abort(redirect()->route('operator.cars')->with('success', 'Car created successfully.'));
  }
  
  private function getarray(CarDto $carDto){
      return [
          'registration_number' => $carDto->registration_number,
          'price_per_day' => $carDto->price_per_day,
          'availability' => $carDto->availability,
          'carburant' => $carDto->carburant,
          'carDetail_id' => $carDto->carDetail_id,
          'category_id' => $carDto->category_id,
          'operator_id' => $carDto->operator_id,
      ];
  }
  

      public function update(car $car, carDto $carDto){
         $car = car::find($car->id);
         $car->registration_number =  $carDto->registration_number;
         $car->price_per_day = $carDto->price_per_day;
         $car->availability = $carDto->availability;
         $car->carburant = $carDto->carburant;
         $car->image = $carDto->image;
         $car->carDetail_id = $carDto->carDetail_id;
         $car->category_id = $carDto->category_id;
         $car->operator_id = $carDto->operator_id;

         $car->save();
         return abort(redirect()->route('operator.cars'));
     }
}
