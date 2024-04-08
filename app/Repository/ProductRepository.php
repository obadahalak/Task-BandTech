<?php
namespace App\Repository;

use App\Models\Product;
use App\Traits\UploadImage;
use App\helpers\ApiResponse;
use App\Repository\ProductInterface;
use App\Http\Requests\ProductRequest;

class ProductRepository implements ProductInterface
{
    use UploadImage;
    public function index()
    {
        return Product::all();
    }

    public function store(ProductRequest $request)
    {
        Product::create(
            [
                'image' => $this->upload($request->image, 'image_product'),
                'is_active' => false,
            ] + $request->validated(),
        );

        return ApiResponse::createSuccessResponse();
    }

    public function show(Product $product)
    {
        return $product;
    }

    public function edit(Product $product)
    {
        return $product;
    }

    public function update(ProductRequest $request, Product $product)
    {
        $this->updateImage($product);

        $product->update(
            [
                'image' => $this->upload($request->image, 'image_product'),
            ] + $request->validated(),
        );

        return ApiResponse::updateSuccessResponse();
    }

    public function destroy(Product $product)
    {
        $this->deleteImage($product->image, 'image');
        $product->delete();

        return ApiResponse::deleteSuccessResponse();
    }
}
