<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\points_of_sales\PointsOfSalesRequest;
use App\Models\PointOfSale;
use Illuminate\Http\Request;
use App\Services\SimpleService;
use App\Services\DataService;
class PointsOfSalesController extends Controller
{
    public function __construct(private SimpleService $simple, private DataService $data)
    {
    }
    public function index() {
        return view('admin.pointsofsales.index');
    }

    public function create() {
        return view('admin.pointsofsales.create');
    }

    public function store(PointsOfSalesRequest $request) {
        $data = $request->all();
        $data['status'] = (bool)$request->status;
        $data['slug'] = $this->data->sluggableArray($data, 'title');
        $request = new Request($data);
        if ($this->simple->simple_create(new PointOfSale(), $request)) {
            return redirect()->route('admin.categories.index')->with('success', __('status.success_add'));
        } else {
            return redirect()->route('admin.categories.index')->with('error', __('status.error_add'));
        }
    }
}
