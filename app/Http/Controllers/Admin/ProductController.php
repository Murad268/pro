<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\products\StatisticRequest;
use App\Models\PointOfSale;
use App\Models\Product;
use App\Models\Statistic;
use Illuminate\Http\Request;
use App\Services\DataService;
use App\Services\SimpleService;

class ProductController extends Controller
{

    public function __construct(private SimpleService $simple, private DataService $data)
    {
    }
    public function index($slug)
    {
        $shops = PointOfSale::all();
        $filter = 0;
        $product = Product::where('slug->' . app()->getLocale(), 'like', '%' . $slug . '%')->first();
        $statistic = Statistic::where('product_id', $product->id)->orderBy('time')->paginate(10);
        $start_date = '';
        $end_date = '';
        return view('admin.product.index', compact('statistic', 'slug', 'shops', 'filter',  'start_date', 'end_date'));
    }

    public function create($slug)
    {
        $shops = PointOfSale::where('status', 1)->get();
        return view('admin.product.create', compact('shops', 'slug'));
    }


    public function store(StatisticRequest $request, $slug)
    {
        $product = Product::where('slug->' . app()->getLocale(), 'like', '%' . $slug . '%')->first();
        $data = $request->all();
        $data['product_id'] = $product->id;

        $created = Statistic::create($data);

        if ($created) {
            return redirect()->route('admin.admin.product.index', $slug);
        }
    }





    public function destroy($id)
    {
        $shop = PointOfSale::findOrFail($id);
        if ($this->simple->simple_delete($shop)) {
            return redirect()->route('admin.admin.product.index')->with('success', __('site.success_remove'));
        } else {
            return redirect()->route('admin.admin.product.index')->with('error', __('site.error_remove'));
        }
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
            // Eğer start_date ve end_date varsa, zaman aralığını sınırla
            $query->whereBetween('time', [$start_date, $end_date]);
        }

        if ($filter != 0) {
            // Eğer filter seçildiyse, point_of_sale_id'yi de filtrele
            $query->where('point_of_sale_id', $filter);
        }


        $statistic = $query->paginate(10);

        return view('admin.product.index', compact('statistic', 'slug', 'shops', 'filter', 'start_date', 'end_date'));
    }
}
