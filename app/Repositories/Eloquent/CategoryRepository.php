<?php

namespace App\Repositories\Eloquent;

use App\DTO\categoryDto;
use App\Models\category;
use App\Repositories\categoryRepositoryInterface;
use TimWassenburg\RepositoryGenerator\Repository\BaseRepository;

/**
 * Class categoryRepository.
 */
class categoryRepository  implements categoryRepositoryInterface
{
    /**
     * UserRepository constructor.
     *
     * @param category $model
     */



    public function store(categoryDto $categoryDto){
        $category = Category::create($this->getarray($categoryDto));
        // dd($category);
        return abort(redirect()->route('operator.categories'));
    }

    private function getarray(categoryDto $categoryDto){
        return [
            'name' => $categoryDto->name,
            'image' => $categoryDto->image,
        ];
    }


    public function update(category $category, categoryDto $categoryDto){
       
        $category = category::find($category->id);
        $category->name = $categoryDto->name;
        $category->image = $categoryDto->image;
        $category->save();
        return abort(redirect()->route('operator.categories'));

        
    }



   

}
