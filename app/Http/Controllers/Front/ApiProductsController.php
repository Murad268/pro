<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Services\DataService;
use App\Services\SimpleService;
use Illuminate\Http\Request;

class ApiProductsController extends Controller
{
    public function __construct(private SimpleService $simple, private DataService $data)
    {
    }

    public function getProducts(Request $request, $q)
    {
        $model = Product::class;
        $query = 'name';
        $products = $this->data->simple_search($model, $query, $q, null);
        return response()->json($products);
    }
}
