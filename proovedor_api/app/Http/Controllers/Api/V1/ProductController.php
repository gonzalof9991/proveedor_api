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
            ->with(['category','brand','tickets'])
            ->get();
        return ProductResource::collection($products);
    }


    public function store(Request $request): ProductResource
    {
        $productId = Product::query()->latest()->get('id')->first();
        $productId = $productId->id;
        $productId = $productId + 1;
        $data = [
            "id" => $productId,
            "name" => $request->json(['name']),
            "product_code" => "p-".$productId,
            "description" => "prueba",
            "price" => $request->json(['price']),
            "stock" => $request->json(['stock']),
            "image_url" => "prueba",
            "is_recommended" => false,
            "category_id" => $request->json(['category_id']),
            "brand_id" => $request->json(['brand_id'])
        ];
        $product = Product::create($data);
        return ProductResource::make($product);

    }


    public function show($productId)
    {
        $product = Product::query()
            ->with(['category','brand','tickets'])
            ->find($productId);
        return new ProductResource($product);



    }


    public function update(Request $request, Product $product): ProductResource
    {
        $data = [
            "name" => $request->json(['name']),
            "product_code" => $request->json(['name']) ,
            "description" => "prueba",
            "price" => $request->json(['price']),
            "stock" => $request->json(['stock']),
            "image_url" => "prueba",
            "is_recommended" => false,
            "category_id" => $request->json(['category_id']),
            "brand_id" => $request->json(['brand_id']),
            "ticket_id" => $request->json(['ticket_id'])
        ];
        $productId = $product->getAttribute('id');
        $product = Product::query()->find($productId);
        $product->update($data);
        echo $product;
        return ProductResource::make($product);
    }


    public function destroy(Product $product)
    {
        //
    }
}
