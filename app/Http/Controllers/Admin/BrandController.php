<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\BrandRequest;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::orderBy('id', 'DESC')->paginate(5);
        $category = Category::where('status', 0)->get();
        return view('admin.brand.index', compact('brands', 'category'));
    }
    public function store(BrandRequest $request)
    {
        $brand = new Brand();
        $slug = Str::slug(request('name'));
        $request['slug'] = $slug;
        $status = $request->status == true ? '1' : '0';
        $request['status'] = $status;
        $brand->create($request->all());
        session()->flash('success', 'Brand has been created');
        return redirect('admin/brands');
    }


    public function edit(BrandRequest $request, $id)
    {
        if ($request->isMethod('post')) {
            $brand = Brand::findOrFail($id);
            $slug = Str::slug(request('name'));
            $request['slug'] = $slug;
            $status = $request->status == true ? '1' : '0';
            $request['status'] = $status;
            $data = $request->all();

            $brand->update($data);
            session()->flash('success', 'Brand has been created');
            return redirect('admin/brands');
        }
    }

    public function delete($id = null)
    {
        Brand::where(['id' => $id])->delete();
        session()->flash('success', 'Brand has been deleted');
        return redirect('admin/brands');
    }
}
