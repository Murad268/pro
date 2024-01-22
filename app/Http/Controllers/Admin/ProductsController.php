<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\products\CreateProductsRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\DataService;
use App\Services\SimpleService;

class ProductsController extends Controller
{
    public function __construct(private SimpleService $simple, private DataService $data)
    {
    }
    public function index()
    {
        $products = Product::paginate(10);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(CreateProductsRequest $request)
    {

        $data = $request->all();
        $data['status'] = (bool)$request->status;
        $data['slug'] = $this->data->sluggableArray($data, 'name');
        $request = $request->merge($data);

        if ((bool)$this->simple->simple_create_with_img(new Product(), $request, 'products/')) {
            return redirect()->route('admin.admin.products.index')->with('success', __('site.success_add'));
        } else {
            return redirect()->route('admin.admin.products.index')->with('error', __('site.error_add'));
        }
    }



    public function edit(Product $product) {
        return view('admin.products.edit', compact('product'));
    }




    public function update(CreateProductsRequest $request, Product $product)
    {
      
        $data = $request->all();

        $array = [
            'image' => $product->image
        ];







        
        $propertiesToCheck = ['image'];








        foreach ($propertiesToCheck as $property) {
            if ($request->has($property)) {
                $array[$property] = $product->$property;
            }
        }


        





        $data['status'] = (bool)$request->status;
        $data['slug'] = $this->data->sluggableArray($data, 'name');
        $request = $request->merge($data);




        if ((bool)$this->simple->simple_update_with_img($product, $request, $array, 'products/')) {
            return redirect()->route('admin.admin.products.index')->with('success', __('status.success_add'));
        } else {
            return redirect()->route('admin.admin.products.index')->with('error', __('status.error_add'));
        }
    }








    public function destroy($id) {

        $product = Product::findOrFail($id);
        $array = ['image' => $product->image];
        if ((bool)$this->simple->simple_delete_with_img($product, $array, 'products')) {
            return redirect()->route('admin.admin.products.index')->with('success', __('site.success_remove'));
        } else {
            return redirect()->route('admin.admin.products.index')->with('error', __('site.error_remove'));
        }
    }


    public function search(Request $request)
    {
        $q = $request->q;
        $paginate = 10;
        $model = Product::class;
        $query = 'name';
        $products = $this->data->simple_search($model, $query, $q, $paginate);
        return view('admin.products.index', compact('products'));
    }


    public function ids_proccess(Request $request)
    {

        $ids = explode(',', $request->ids);

        $ids_proccess = $request->ids_proccess;
        return $this->data->do_proccess_with_img(new Product(), $ids, $ids_proccess, 'products');
    }
}
