<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Brand;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProduct = Product::count();
        $totalCategory = Category::count();
        $totalBrand = Brand::count();

        $totalAllUsers = User::count();
        $totalUser = User::where('role_as', 0)->count();
        $totalAdmin = User::where('role_as', 1)->count();

        $totalOrders = Order::count();
        $todayDate = Carbon::now()->format('d-m-Y');
        $thisMonth = Carbon::now()->format('m');
        $thisYear = Carbon::now()->format('Y');
        $totalTodayOrder = Order::whereDate('created_at', $todayDate)->count();
        $totalThisMonthOrder = Order::whereMonth('created_at', $thisMonth)->count();
        $totalThisYearOrder = Order::whereYear('created_at', $thisYear)->count();

        return view('admin.dashboard', compact(
            'totalProduct',
            'totalCategory',
            'totalBrand',
            'totalAllUsers',
            'totalUser',
            'totalAdmin',
            'totalOrders',
            'totalTodayOrder',
            'totalThisMonthOrder',
            'totalThisYearOrder',
        ));
    }
}
