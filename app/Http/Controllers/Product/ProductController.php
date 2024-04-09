<?php

namespace App\Http\Controllers\Product;

use App\Models\Product;
use App\Http\Requests\TsetRequest;
use App\Http\Controllers\Controller;
use App\Repository\ProductInterface;
use App\Http\Requests\Product\ProductRequest;

class ProductController extends Controller
{
    public function __construct(private ProductInterface $ProductRepository)
    {
    }
    public function index()
    {
        return response()->json($this->ProductRepository->index());
    }

    public function store(ProductRequest $request)
    {
        return response()->json($this->ProductRepository->store($request));
    }

    public function show(Product $product)
    {
        return response()->json($this->ProductRepository->show($product));
    }


    public function edit(Product $product)
    {
        return response()->json($this->ProductRepository->edit($product));
    }

    public function update(ProductRequest $request, Product $product)
    {
        return response()->json($this->ProductRepository->update($request,$product));
    }

    public function destroy(Product $product)
    {
        return response()->json($this->ProductRepository->destroy($product));
    }
}
