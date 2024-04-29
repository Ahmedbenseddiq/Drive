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



     public function store(CategoryDto $categoryDto){
        $fileName = pathinfo($categoryDto->image->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = pathinfo($categoryDto->image->getClientOriginalName(), PATHINFO_EXTENSION);
        $fullFileName = $fileName . "-" . time() . '.' . $categoryDto->image->getClientOriginalExtension();
    
        $destinationPath = './assets/uploads/';
    
        $categoryDto->image->move(public_path($destinationPath), $fullFileName);
        $data = $this->getarray($categoryDto) + ['image' => $fullFileName];
    
        $category = Category::create($data);
        
        return abort(redirect()->route('operator.categories')->with('success', 'Category created successfully.'));
    }

    private function getarray(categoryDto $categoryDto){
        return [
            'name' => $categoryDto->name,
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
