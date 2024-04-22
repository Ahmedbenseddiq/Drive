<?php

namespace App\Repositories\Eloquent;

use App\Models\Car;
use App\Repositories\CarRepositoryInterface;
use TimWassenburg\RepositoryGenerator\Repository\BaseRepository;

/**
 * Class CarRepository.
 */
class CarRepository extends BaseRepository implements CarRepositoryInterface
{
    /**
     * UserRepository constructor.
     *
     * @param Car $model
     */
    public function __construct(Car $model)
    {
        parent::__construct($model);
    }
}
