<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{

    public function index()
    {
        $products = Product::query()
            ->with(['category','brand'])
            ->get();

        return ProductResource::collection($products);
    }


    public function store(Request $request)
    {
        //
    }


    public function show($productId)
    {
        $product = Product::query()
            ->with(['category','brand'])
            ->find($productId);
        return new ProductResource($product);

    }


    public function update(Request $request, Product $product)
    {
        //
    }


    public function destroy(Product $product)
    {
        //
    }
}
