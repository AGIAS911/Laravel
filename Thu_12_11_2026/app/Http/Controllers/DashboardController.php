<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Seller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index()
    {
        $counts = [
            'users' => User::count(),
            'sellers' => Seller::count(),
            'categories' => Category::count(),
            'products' => Product::count(),
            'orders' => Order::count(),
        ];

        $totalRevenue = Order::sum('total_amount');

        $recentOrders = Order::with('user')->latest()->take(5)->get();

        return view('dashboard.index', compact('counts', 'totalRevenue', 'recentOrders'));
    }
}
