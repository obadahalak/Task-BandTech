<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\UserType;
use Illuminate\Http\Request;
use App\Service\ProductByUserTypeService;

class ProductByUserTypeController extends Controller
{
    public function index(ProductByUserTypeService $productByUserTypeService)
    {
        return response()->json($productByUserTypeService->index());
       
    }

}
