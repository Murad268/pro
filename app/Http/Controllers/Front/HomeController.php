<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\PointOfSale;
use App\Models\Product;
use App\Models\Statistic;
use App\Services\DataService;
use App\Services\SimpleService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(private SimpleService $simple, private DataService $data)
    {
    }
    public function index() {
        return view('front.client.home');
    }



    public function product_info($slug)
    {
        $shops = PointOfSale::all();
        $filter = 0;
        $product = Product::where('slug->' . app()->getLocale(), 'like', '%' . $slug . '%')->first();
        $statistic = Statistic::where('product_id', $product->id)->orderBy('time')->paginate(10);
        $start_date = '';
        $end_date = '';
        return view('front.client.product', compact('statistic', 'slug', 'shops', 'filter',  'start_date', 'end_date'));
    }


    public function ids_proccess(Request $request)
    {
        $ids = explode(',', $request->ids);
        $ids_proccess = $request->ids_proccess;
        return $this->data->do_proccess(new Statistic(), $ids, $ids_proccess);
    }


    public function search(Request $request)
    {
    }

    public function for_shops($slug, Request $request)
    {

        $shops = PointOfSale::all();
        $filter = $request->select2;
        $product = Product::where('slug->' . app()->getLocale(), 'like', '%' . $slug . '%')->first();
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $query = Statistic::where('product_id', $product->id)->orderBy('time');
        if ($start_date && $end_date) {
            $query->whereBetween('time', [$start_date, $end_date]);
        }
        if ($filter != 0) {
            $query->where('point_of_sale_id', $filter);
        }
        $statistic = $query->paginate(10);
        return view('front.client.product', compact('statistic', 'slug', 'shops', 'filter', 'start_date', 'end_date', 'product'));
    }
}
