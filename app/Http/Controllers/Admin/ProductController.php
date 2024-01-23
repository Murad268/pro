<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\products\StatisticRequest;
use App\Models\PointOfSale;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($slug) {
        $products = Product::where('slug->'.app()->getLocale(), 'like', '%' . $slug . '%')->paginate(10);
        return view('admin.product.index', compact('products','slug'));
    }

    public function create($slug) {
        $shops = PointOfSale::where('status', 1)->get();
        return view('admin.product.create', compact('shops', 'slug'));
    }


    public function store(StatisticRequest $request, $slug) {
        dd($request->all());
    }
}
