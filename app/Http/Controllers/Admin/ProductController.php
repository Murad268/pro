<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\products\StatisticRequest;
use App\Models\PointOfSale;
use App\Models\Product;
use App\Models\Statistic;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($slug) {
        $product = Product::where('slug->'.app()->getLocale(), 'like', '%' . $slug . '%')->first();
        $statistic = Statistic::where('product_id', $product->id)->paginate(10);
        return view('admin.product.index', compact('statistic','slug'));
    }

    public function create($slug) {
        $shops = PointOfSale::where('status', 1)->get();
        return view('admin.product.create', compact('shops', 'slug'));
    }


    public function store(StatisticRequest $request, $slug) {
        $product = Product::where('slug->' . app()->getLocale(), 'like', '%' . $slug . '%')->first();
        $data = $request->all();
        $data['product_id'] = $product->id;

        $created = Statistic::create($data);

        if($created) {
            return redirect()->route('admin.admin.product.index', $slug);
        }
    }
}
