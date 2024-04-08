<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function tset(UpdateUserRequest $request,Product $product)
    {
        dd($product);
    }
}
