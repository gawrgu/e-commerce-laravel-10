<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Brand;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('status', 0)->get();
        $categories = Category::where('status', 0)->get();
        $productTrending = Product::where('trending', 1)->where('status', 0)->latest()->take(12)->get();
        $newArrivals = Product::where('status', 0)->latest()->take(12)->get();
        $featuredProduct = Product::where('status', 0)->where('featured', 1)->latest()->take(12)->get();
        return view('frontend.index', compact('sliders', 'categories', 'productTrending', 'newArrivals', 'featuredProduct'));
    }

    public function searchProduct(Request $request)
    {
        if ($request->search) {
            $searchProducts = Product::where('name', 'LIKE', '%' . $request->search . '%')->latest()->paginate(5);
            return view('frontend.pages.search', compact('searchProducts'));
        } else {
            return redirect()->with('message', 'Empty search');
        }
    }

    public function newArrival()
    {
        $newArrivals = Product::where('status', 0)->latest()->take(16)->get();
        return view('frontend.pages.new-arrival', compact('newArrivals'));
    }

    public function featuredProduct()
    {
        $featuredProduct = Product::where('status', 0)->where('featured', 1)->latest()->get();
        return view('frontend.pages.featured-product', compact('featuredProduct'));
    }

    public function categories()
    {
        $categories = Category::where('status', 0)->get();
        return view('frontend.categories.index', compact('categories'));
    }

    public function products($category_slug)
    {
        $category = Category::where('slug', $category_slug)->first();
        if ($category) {
            return view('frontend.categories.products.index', compact('category'));
        } else {
            return redirect()->back();
        }
    }

    public function productView(String $category_slug, String $product_slug)
    {
        $category = Category::where('slug', $category_slug)->first();
        if ($category) {
            $product = $category->products->where('slug', $product_slug)->where('status', 0)->first();
            if ($product) {
                return view('frontend.categories.products.view', compact('category', 'product'));
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }

    public function thankyou()
    {
        return view('frontend.thank-you');
    }
}
