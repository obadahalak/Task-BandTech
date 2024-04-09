<?php
namespace App\Service;

use App\Enums\UserType;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\table;

class ProductByUserTypeService
{
    public function index()
    {
        $userType = auth()->user()->type;

      return Product::where('is_active', true)
            ->select(
            'id', 'name', 'description', 
            'image', 'slug', 'is_active', 
            'created_at', 'updated_at')
            ->selectRaw('CASE
                WHEN ? = ? THEN price * 0.9
                WHEN ? = ? THEN price * 0.95
                ELSE price
            END AS discounted_price', [$userType, UserType::GOLD, $userType, UserType::SILVER])
            ->get();

    }
}
