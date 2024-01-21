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

    public function do_proccess($model, $ids, $ids_proccess)
    {
        if ($ids_proccess == "delete") {
            foreach ($ids as $id) {

                $result = $model::findOrFail($id);
                $this->simple->simple_delete($result);
            }
            return redirect()->back()->with('success', __('site.success_remove'));
        } else if ($ids_proccess == "active") {
            foreach ($ids as $id) {
                $result = $model::findOrFail($id);
                $result->status = true;
                $result->save();
            }
            return redirect()->back()->with('success', __('site.success_active'));
        } else if ($ids_proccess == "passive") {
            foreach ($ids as $id) {
                $result = $model::findOrFail($id);
                $result->status = false;
                $result->save();
            }
            return redirect()->back()->with('success', __('site.success_passive'));
        }
    }





    public function do_proccess_with_img($model, $ids, $ids_proccess, $path)
    {
        if ($ids_proccess == "delete") {
            foreach ($ids as $id) {

                $result = $model::findOrFail($id);
                $array = ['image' => $result->image];

                $this->simple->simple_delete_with_img($result, $array, $path);
            }
            return redirect()->back()->with('success', __('site.success_remove'));
        } else if ($ids_proccess == "active") {
            foreach ($ids as $id) {
                $result = $model::findOrFail($id);
                $result->status = true;
                $result->save();
            }
            return redirect()->back()->with('success', __('site.success_active'));
        } else if ($ids_proccess == "passive") {
            foreach ($ids as $id) {
                $result = $model::findOrFail($id);
                $result->status = false;
                $result->save();
            }
            return redirect()->back()->with('success', __('site.success_passive'));
        }
    }



    public function simple_search($model, $query, $q, $paginate)
    {
        if ($q) {
            $results = $model::where(DB::raw("LOWER($query)"), 'like', '%' . strtolower($q) . '%')->paginate($paginate);
        } else {
            $results = $model::paginate($paginate);
        }
        return $results;
    }
}
