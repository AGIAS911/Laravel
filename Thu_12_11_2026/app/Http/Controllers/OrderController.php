<?php
namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user')->paginate(10);
        return view('orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        $order->load(['user', 'items.product']);
        
        $calculatedTotal = $order->items->sum(function($item) {
            return $item->quantity * $item->price;
        });

        return view('orders.show', compact('order', 'calculatedTotal'));
    }
}