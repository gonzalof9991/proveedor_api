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


    public function store(Request $request): CategoryResource
    {
        echo $request->json(['name']);
        $categoryId = Category::query()->get('id')->max();
        $categoryId = $categoryId->id + 1;
        $data = [
            "id" => $categoryId,
            "name" => $request->json(['name'])
        ];
        $category = Category::create($data);
        return CategoryResource::make($category);
    }


    public function show($id)
    {
        try {
            $category = Category::query()
                ->with(['products'])
                ->find($id);
            if(isset($category)){
                return new CategoryResource($category);
            }else{
                return 'No existe';
            }

        }catch (\Exception $error){
            return 500;
        }

    }


    public function update(Request $request, Category $category)
    {
        $data = [
            "name" => $request->json(['name']),
        ];
        $categoryId = $category->getAttribute('id');
        $categoryId = Category::query()->find($categoryId);
        $category->update($data);
        return CategoryResource::make($category);
    }


    public function destroy( $id)
    {
        $category = Category::find($id);
        $category->delete();
    }
}
