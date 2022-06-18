<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::query()
            ->with(['products'])
            ->get();

        return CategoryResource::collection($categories);
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Category $category)
    {
        //

        return new CategoryResource($category);
    }


    public function update(Request $request, Category $category)
    {
        //
    }


    public function destroy(Category $category)
    {
        //
    }
}
