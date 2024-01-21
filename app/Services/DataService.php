<?php

namespace App\Services;

use App\Models\PointOfSale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Services\SimpleService;
class DataService
{
    public function __construct(private SimpleService $simple)
    {
    }

    public function sluggable($str)
    {
        return Str::slug($str);
    }
    public function sluggableArray($array, $key)
    {
        $slugs = [];
        foreach ($array[$key] as $key => $value) {
            $slugs[$key] = $this->sluggable($value);
        }
        return $slugs;
    }

    public function do_proccess($ids, $ids_proccess, $route) {
        if ($ids_proccess == "delete") {
            foreach ($ids as $id) {
                $shop = PointOfSale::findOrFail($id);
                $this->simple->simple_delete($shop);
            }
            return redirect()->route($route)->with('success', __('site.success_remove'));
        } else if ($ids_proccess == "active") {
            foreach ($ids as $id) {
                $shop = PointOfSale::findOrFail($id);
                $shop->status = true;
                $shop->save();
            }
            return redirect()->route($route)->with('success', __('site.success_active'));
        } else if ($ids_proccess == "passive") {
            foreach ($ids as $id) {
                $shop = PointOfSale::findOrFail($id);
                $shop->status = false;
                $shop->save();
            }
            return redirect()->route($route)->with('success', __('site.success_passive'));
        }
    }



    public function simple_search($model, $query, $q, $paginate) {
        if ($q) {
            $results = $model::where(DB::raw("LOWER($query)"), 'like', '%' . strtolower($q) . '%')->paginate($paginate);
        } else {
            $results = $model::paginate($paginate);
        }
        return $results;
    }
}
