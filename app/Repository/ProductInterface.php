<?php
namespace App\Repository;

use App\Models\Product;
use App\Http\Requests\ProductRequest;

class ProductInterface
{
    public function index();
    public function store(ProductRequest $request);
    public function show(Product $user);
    public function edit(Product $user);
    public function update(ProductRequest $request, Product $user);
    public function destroy(Product $user);
}
