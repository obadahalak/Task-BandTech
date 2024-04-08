<?php
namespace App\Repository;

use App\Models\Product;
use App\helpers\ApiResponse;
use App\Http\Requests\ProductRequest;
use App\Traits\ImageUpload;

class ProductRepository
{
    use ImageUpload ;
    public function index()
    {
        return Product::all();
    }

    public function store(ProductRequest $request)
    {
        Product::create(
            [
                'image' => $request->file('image')->store('public'),
                'is_active' => false,
            ] + $request->validated(),
        );

        return ApiResponse::createSuccessResponse();
    }

    public function show(Product $product)
    {
        return $product ;
    }

 
    public function edit(Product $product)
    {
        return $product ;
    }

    public function update(ProductRequest $request, Product $product)
    {
        $this->updateImage($product);

        $product->update(
            [
                'image' => $this->uploadImage('image_product'),
            ] + $request->validated(),
        );

        return ApiResponse::updateSuccessResponse();
    }

    public function destroy(Product $product)
    {
        $this->deleteImage($product);
        $product->delete();

        return ApiResponse::deleteSuccessResponse();
    }
}
