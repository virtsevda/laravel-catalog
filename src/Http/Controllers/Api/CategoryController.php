<?php

namespace Virtsevda\LaravelCatalog\Http\Controllers\Api;

use Virtsevda\LaravelCatalog\Http\Controllers\Controller;
use Virtsevda\LaravelCatalog\Models\Category;
use Kalnoy\Nestedset\NodeTrait;


class CategoryController extends Controller
{
 

    public function index(Request $request)
    {
            return Category::all()->json();
    }

    public function store(CategoryStoreRequest $request)
    {

    }

    public function show(Category $category)
    {
       
    }


    public function update(CategoryUpdateRequest $request, Category $category)
    {

    }

    public function destroy($id)
    {
      
    }
}
