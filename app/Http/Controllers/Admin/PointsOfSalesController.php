<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\points_of_sales\PointsOfSalesRequest;
use App\Models\PointOfSale;
use Illuminate\Http\Request;
use App\Services\DataService;
use App\Services\SimpleService;

class PointsOfSalesController extends Controller
{
    public function __construct(private SimpleService $simple, private DataService $data)
    {
    }
    public function index()
    {
        $shops = PointOfSale::paginate(10);
        return view('admin.pointsofsales.index', compact('shops'));
    }

    public function create()
    {
        return view('admin.pointsofsales.create');
    }

    public function store(PointsOfSalesRequest $request)
    {
        $data = $request->all();

        $data['status'] = (bool)$request->status;
        $data['slug'] = $this->data->sluggableArray($data, 'name');
        $request = new Request($data);
        if ($this->simple->simple_create(new PointOfSale(), $request)) {
            return redirect()->route('admin.admin.points_of_sales.index')->with('success', __('site.success_add'));
        } else {
            return redirect()->route('admin.admin.points_of_sales.index')->with('error', __('site.error_add'));
        }
    }
    public function edit($id)
    {
        $shop = PointOfSale::findOrFail($id);
        return view('admin.pointsofsales.edit', compact('shop'));
    }


    public function update(PointsOfSalesRequest $request, $id)
    {
        $shop = PointOfSale::findOrFail($id);
        $data = $request->all();
        $data['status'] = (bool)$request->status;
        $data['slug'] = $this->data->sluggableArray($data, 'name');
        $request = new Request($data);
        if ($this->simple->simple_update($shop, $request)) {
            return redirect()->route('admin.admin.points_of_sales.index')->with('success', __('site.success_update'));
        } else {
            return redirect()->route('admin.admin.points_of_sales.index')->with('error', __('site.error_update'));
        }
    }
    public function destroy($id)
    {
        $shop = PointOfSale::findOrFail($id);
        if ($this->simple->simple_delete($shop)) {
            return redirect()->route('admin.admin.points_of_sales.index')->with('success', __('site.success_remove'));
        } else {
            return redirect()->route('admin.admin.points_of_sales.index')->with('error', __('site.error_remove'));
        }
    }

    public function ids_proccess(Request $request)
    {
        $ids = explode(',', $request->ids);

        $ids_proccess = $request->ids_proccess;
        if ($ids_proccess == "delete") {
            foreach ($ids as $id) {
                $shop = PointOfSale::findOrFail($id);
                $this->simple->simple_delete($shop);
            }
            return redirect()->route('admin.admin.points_of_sales.index')->with('success', __('site.success_remove'));
        } else if($ids_proccess== "active") {
            foreach ($ids as $id) {
                $shop = PointOfSale::findOrFail($id);
                $shop->status = true;
                $shop->save();
            }
            return redirect()->route('admin.admin.points_of_sales.index')->with('success', __('site.success_active'));
        } else if($ids_proccess == "passive") {
            foreach ($ids as $id) {
                $shop = PointOfSale::findOrFail($id);
                $shop->status = false;
                $shop->save();
            }
            return redirect()->route('admin.admin.points_of_sales.index')->with('success', __('site.success_passive'));
        }
    }
}
