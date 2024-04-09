<?php
namespace App\Repository;

use App\Models\Product;
use App\Traits\UploadImage;
use App\helpers\ApiResponse;
use App\Repository\ProductInterface;
use App\Http\Requests\Product\ProductRequest;

class ProductRepository implements ProductInterface
{
    use UploadImage;
    // View all products
    public function index()
    {
        return Product::all();
    }
    // Create a product
    public function store(ProductRequest $request)
    {
        Product::create(
            [
                'image' => $this->upload($request->image, 'product_image'),
                'is_active' => true,
            ] + $request->validated(),
        );

        return ApiResponse::successResponse('created successfully');
    }
    // Product Show 
    public function show(Product $product)
    {
        return $product;
    }
    /// Product width for modification
    public function edit(Product $product)
    {
        return $product;
    }
    /// Modification of the product
    public function update(ProductRequest $request, Product $product)
    {
        $this->updateImage($product->image,'product_image');

        $product->update(
            [
                'image' => $this->upload($request->image, 'product_image'),
            ] + $request->validated(),
        );

        return ApiResponse::successResponse('update successfully');
    }
    //// Delete the product
    public function destroy(Product $product)
    {
        $this->deleteImage($product->image, 'product_image');
        $product->delete();

        return ApiResponse::successResponse('delete successfully');
    }
}
