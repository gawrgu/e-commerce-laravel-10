<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Exists;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id', 'DESC')->paginate('5');
        return view('admin.category.index', compact('categories'));
    }

    public function show(Category $category)
    {
        return view('admin.category.detail', compact('category'));
    }

    public function create()
    {
        return view('admin.category.create', [
            'categories' => new Category(),
        ]);
    }

    public function store(CategoryRequest $request)
    {

        $fileName = '';
        if ($request->file('thumbnail')) {
            $uploadPath = 'uploads/category/';
            $extension = $request->file('thumbnail')->getClientOriginalExtension();
            $fileName = $request->name . '-' . now()->timestamp . '.' . $extension;
            $request->file('thumbnail')->storeAs('uploads/category', $fileName);
            $request['image'] = $uploadPath . $fileName;
        }
        $slug = Str::slug(request('name'));
        $request['slug'] = $slug;
        $status = $request->status == true ? '1' : '0';
        $request['status'] = $status;
        Category::create($request->all());

        session()->flash('success', 'Category was be created');
        return redirect('admin/category');
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    public function update(CategoryRequest $request, $category)
    {
        $category = Category::findOrFail($category);
        if ($request->file('thumbnail')) {
            $uploadPath = 'uploads/category/';
            $path = 'storage/' . $category->image;
            if (File::Exists($path)) {
                File::delete($path);
            }
            $extension = $request->file('thumbnail')->getClientOriginalExtension();
            $fileName = $request->name . '-' . now()->timestamp . '.' . $extension;
            $request->file('thumbnail')->storeAs('uploads/category', $fileName);
            $request['image'] = $uploadPath . $fileName;
        } else {
            $fileName = $category->image;
        }

        $slug = Str::slug(request('name'));
        $request['slug'] = $slug;
        $status = $request->status == true ? '1' : '0';
        $request['status'] = $status;
        $category->update($request->all());

        session()->flash('success', 'Category was be Update');
        return redirect('admin/category');
    }

    public function destroy(Category $category)
    {
        $path = 'storage/uploads/category/' . $category->image;
        if (File::exists($path)) {
            File::delete($path);
        }
        $category->delete();
        session()->flash('success', 'Category has been deleted');
        return redirect('admin/category');
    }
}
