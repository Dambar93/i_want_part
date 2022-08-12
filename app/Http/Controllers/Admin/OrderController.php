<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;

class OrderController extends Controller
{
    public function list()
    {
        $orders = Order::paginate(10);
        
        return view('admin.orders.list', compact('orders'));
    }

    public function show(int $id)
    {
        $order = Order::find($id);
        $order_items = OrderItem::where('order_id', '=', $id)
        ->get();
        
        return view('admin.orders.show', compact('order', 'order_items'));
    }
}
