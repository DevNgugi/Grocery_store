<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    
    public function index()
    {
    //   get all orders with same user id
        
        $orders = Order::where('user_id', '=', auth()->user()->id)->get();
        return view('orders', compact('orders'));
    }
    public function adminOrdersList()
    {
    //   get all orders with same user id
        
        $orders = Order::where('user_id', '=', auth()->user()->id)->get();
        return view('admin.orders-list', compact('orders'));
    }

   
    public function invoice($id)
    {
        //get invoice with same id
        $invoice = Order::where('id', '=', $id)->first();
        return view('invoice', compact('invoice'));
    }

    public function orderDetailAdmin($id)
    {
        //get invoice with same id
        $invoice = Order::where('id', '=', $id)->first();
        return view('admin.order-detail', compact('invoice'));
    }
    
    // UPDATE ORDER BY ID
    public function updateOrder(Request $request, $id)
    {
        //get invoice with same id
        $invoice = Order::where('id', '=', $id)->first();
        $invoice->status = $request->input('status');
        $invoice->save();
        return redirect()->back()->with('success', 'Order Updated');
    }
}