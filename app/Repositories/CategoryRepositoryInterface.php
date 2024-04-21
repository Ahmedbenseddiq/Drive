<?php

namespace App\Repositories;

use App\DTO\categoryDto;
use App\Models\category;
use App\Http\Requests\StorecategoryRequest;

interface CategoryRepositoryInterface
{
  public function store(categoryDto $categoryDto);
  public function update(category $category, categoryDto $categoryDto);
}
