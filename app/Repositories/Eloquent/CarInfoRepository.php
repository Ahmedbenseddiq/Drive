<?php

namespace App\Repositories\Eloquent;

use App\DTO\CarInfoDto;
use App\Models\Cardetail;
use App\Repositories\CarInfoRepositoryInterface;
use TimWassenburg\RepositoryGenerator\Repository\BaseRepository;

/**
 * Class CarInfoRepository.
 */
class CarInfoRepository implements CarInfoRepositoryInterface
{
    /**
     * UserRepository constructor.
     *
     * @param Cardetail $model
     */


    public function store(CarInfoDto $carInfoDto){
        $carInfo = Cardetail::create($this->getarray($carInfoDto));
        // dd($carInfo);
        return abort(redirect()->route('operator.carInfo'));
    }

    public function getarray(CarInfoDto $carInfoDto){
        return [
            'brand' => $carInfoDto->brand,
            'model' => $carInfoDto->model,
        ];
    }

    public function update(Cardetail $cardetail, CarInfoDto $carInfoDto){
        $cardetail = Cardetail::find($cardetail->id);
        $cardetail->brand = $carInfoDto->brand;
        $cardetail->model = $carInfoDto->model;
        $cardetail->save();
        return abort(redirect()->route('operator.carInfo'));
    }
}
