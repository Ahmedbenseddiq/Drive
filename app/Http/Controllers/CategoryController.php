<?php

namespace App\Http\Controllers;

use App\DTO\CategoryDto;
use App\Models\category;
use App\Http\Requests\StorecategoryRequest;
use App\Http\Requests\UpdatecategoryRequest;
use App\Repositories\CategoryRepositoryInterface;

class CategoryController extends Controller
{

    public function __construct(public CategoryRepositoryInterface $repository){

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('operator.category.categories',['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('operator.category.addCategory');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $storeCategoryRequest)
    {
        $categoryDto = CategoryDto::fromRequest($storeCategoryRequest);

        $this->repository->store($categoryDto);
    }

    /**
     * Display the specified resource.
     */
    public function show(category $category)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(category $category)
    {
        return view('operator.category.editCategory',['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(category $category, UpdatecategoryRequest $request)
    {
        $categoryDto = categoryDto::fromRequest($request);
        $this->repository->update($category, $categoryDto);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(category $category)
    {
        $category->delete();
        return abort(redirect(route('operator.categories')))->with('success','Category deleted Successfully');
    }
}
