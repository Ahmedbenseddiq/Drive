<?php

namespace App\Repositories\Eloquent;

use App\DTO\categoryDto;
use App\Models\category;
use App\Repositories\categoryRepositoryInterface;
use TimWassenburg\RepositoryGenerator\Repository\BaseRepository;

/**
 * Class categoryRepository.
 */
class categoryRepository extends BaseRepository implements categoryRepositoryInterface
{
    /**
     * UserRepository constructor.
     *
     * @param category $model
     */
    public function __construct(category $model)
    {
        parent::__construct($model);
    }


    public function store(categoryDto $categoryDto){
        $category = Category::create($this->getarray($categoryDto));

        return abort(redirect()->route('operator.category'));
    }

    public function getarray(categoryDto $categoryDto){
        return [
            'name' => $categoryDto->name,
            'image' => $categoryDto->image,
        ];
    }



   

}
