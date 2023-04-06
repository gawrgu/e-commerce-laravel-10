<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ProductRequest;
use App\Models\{Brand, Product, Category, Color, ProductColor};


class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(5);
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {

        return view('admin.product.create', [
            'product' => new Product(),
            'categories' => Category::get(),
            'brands' => Brand::get(),
            'colors' => Color::where('status', 0)->get(),
        ]);
    }

    public function store(ProductRequest $request)
    {
        $slug = Str::slug(request('name'));
        $request['slug'] = $slug;
        $trending = $request->trending == true ? '1' : '0';
        $request['trending'] = $trending;
        $featured = $request->featured == true ? '1' : '0';
        $request['featured'] = $featured;
        $status = $request->status == true ? '1' : '0';
        $request['status'] = $status;
        $product = Product::create($request->all());

        if ($request->hasFile('thumbnail')) {
            $i = 1;
            foreach ($request->file('thumbnail') as $imageFile) {
                $extension = $imageFile->getClientOriginalExtension();
                $fileName = $request->name . '-' . now()->timestamp . $i++ . '.' . $extension;
                $imageFile->storeAs('uploads/product', $fileName);

                $product->productImages()->create([
                    'product_id' => $product->id,
                    'image' => $fileName
                ]);
            }
        }
        if ($request->colors) {
            foreach ($request->colors as $key => $color) {
                $product->productColors()->create([
                    'product_id' => $product->id,
                    'color_id' => $color,
                    'quantity' => $request->colorquantity[$key] ?? 0,
                ]);
            }
        }
        session()->flash('success', 'Product was be created');
        return redirect('admin/products');
    }

    public function edit(Int $product_id)
    {
        $product = Product::findOrFail($product_id);
        $categories = Category::get();
        $brands = Brand::get();
        $productImage = ProductImage::get();
        $productColors = $product->productColors->pluck('color_id')->toArray();
        $colors = Color::whereNotIn('id', $productColors)->get();
        return view('admin.product.edit', compact([
            'product',
            'categories',
            'brands',
            'productImage',
            'productColors',
            'colors',
        ]));
    }

    public function update(ProductRequest $request, Int $product_id)
    {

        $product = Category::findOrFail($request['category_id'])
            ->products()->where('id', $product_id)->first();
        if ($product) {
            $slug = Str::slug(request('name'));
            $request['slug'] = $slug;
            $trending = $request->trending == true ? '1' : '0';
            $request['trending'] = $trending;
            $featured = $request->featured == true ? '1' : '0';
            $request['featured'] = $featured;
            $status = $request->status == true ? '1' : '0';
            $request['status'] = $status;
            $product->update($request->all());
        } else {
            session()->flash('success', 'No such product id found');
            return redirect('admin/products');
        }
        if ($request->hasFile('thumbnail')) {
            $i = 1;
            foreach ($request->file('thumbnail') as $imageFile) {
                $extension = $imageFile->getClientOriginalExtension();
                $fileName = $request->name . '-' . now()->timestamp . $i++ . '.' . $extension;
                $imageFile->storeAs('uploads/product', $fileName);

                $product->productImages()->create([
                    'product_id' => $product->id,
                    'image' => $fileName
                ]);
            }
        }
        if ($request->colors) {
            foreach ($request->colors as $key => $color) {
                $product->productColors()->create([
                    'product_id' => $product->id,
                    'color_id' => $color,
                    'quantity' => $request->colorquantity[$key] ?? 0,
                ]);
            }
        }
        session()->flash('success', 'Product was be updated');
        return redirect('admin/products');
    }

    public function destroyImage(Int $product_image_id)
    {
        $productImage = ProductImage::findOrFail($product_image_id);
        $path = 'storage/uploads/product/' . $productImage->image;

        if (File::exists($path)) {
            File::delete($path);
        }
        $productImage->delete();
        session()->flash('success', 'Product image was be deleted');
        return redirect()->back();
    }

    public function destroy(Int $product_id)
    {
        $product = Product::findOrFail($product_id);
        if ($product->productImages()) {
            foreach ($product->productImages as $image) {
                $path = 'storage/uploads/product/' . $image->image;
                if (File::exists($path)) {
                    File::delete($path);
                }
            }
        }
        $product->delete();
        session()->flash('success', 'Product was be deleted');
        return redirect('admin/products');
    }

    public function updateProductColorQty(Request $request, $prod_color_id)
    {
        $productColorData = Product::findOrFail($request->product_id)
            ->productColors()->where('id', $prod_color_id)->first();
        $productColorData->update([
            'quantity' => $request->qty
        ]);

        return response()->json(['message' => 'Product Color Qty Updated!']);
    }

    public function deleteProdColor($prod_color_id)
    {
        $prodColor = ProductColor::findOrFail($prod_color_id);
        $prodColor->delete();
        return response()->json(['message' => 'Product Color Deleted!']);
    }
}
