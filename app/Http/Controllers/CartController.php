<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index()
    {
        //get items from cart with same user id
        $cart = Cart::where('user_id', '=', auth()->user()->id)->get();
        return view('cart', compact('cart'));
    }


    public function clearCart()
    {
        //clear cart where user id is same
        Cart::where('user_id', '=', auth()->user()->id)->delete();
        return redirect()->back()->with('success', 'Cart Cleared');
    }

    public function store(Request $request)
    {



        try {
            //code...
        // if user not logged in redirect to login page
        
            $cart = new Cart();
            // check if user is logged in
            if (auth()->user()) {
                $cart->user_id = auth()->user()->id;
            } else {
                // get database with same user and product id

                return response()->json(['redirect' => route('login')]);
            }
            $exists = Cart::where('user_id', '=', auth()->user()->id)->where('product_id', '=', $request->input('id'))->exists();
                if ($exists) {
                    return response()->json(['error' => 'Product Already in Cart']);
                }
                else{
                    $cart->product_id = $request->input('id');
                    $cart->quantity = '1';
        
                    $cart->save();
        
                    return response()->json(['success' => 'Product Added to Cart']);
                }
            

        } catch (\Throwable $th) {

            return response()->json(['error' => $th->getMessage()]);

            // return redirect()->back()->with('error', $th->getMessage());


        }
    }

    public function updateCart(Request $request)
    {
        //update cart
        try{
            $cart = Cart::find($request->input('id'));
            $cart->quantity = $request->input('quantity');
            $cart->save();
            return response()->json(['success' => 'Cart Updated', 'index' => $request->input('index'),'length' => $request->input('length')]);
        }
        
        catch(\Throwable $th){
            return response()->json(['error' => $th->getMessage()]);
        }

    }

    public function checkout()
    {
        //
        $cart = Cart::where('user_id', '=', auth()->user()->id)->get();
        return view('checkout', compact('cart'));
      
    }


    public function createOrder(Request $request)
    {
        //get items in cart
        $cart_item = Cart::where('user_id', '=', auth()->user()->id)->get();
        // loop through cart items
        $item_names=[];
        $item_prices=[];
        $item_quantities=[];
        $item_totals=[];


        foreach ($cart_item as $item) {
         array_push($item_names, $item->getProductRelation->title);
         array_push($item_prices, $item->getProductRelation->price);
         array_push($item_quantities, $item->quantity);
         array_push($item_totals, $item->quantity * $item->getProductRelation->price);
        }
        
        // calculate total

        //create order
        $order = new Order();
        $order->user_id = auth()->user()->id;
        $order->payment_method = 'Cash';
        $order->delivery_address = auth()->user()->id;
        $order->item_names =json_encode($item_names);
        $order->item_prices =json_encode($item_prices);
        $order->item_quantities =json_encode($item_quantities);
        $order->item_totals =json_encode($item_totals);
        $order->total = array_sum($item_totals);
        $order->status = 'Pending';	
        $order->save();
        // delete items in cart
        Cart::where('user_id', '=', auth()->user()->id)->delete();
        // redirect to orders page
        return redirect()->route('orders')->with('success', 'Order Placed Successfully');

    }


    public function getCount()
    {
        //get cart count for user
        $count = Cart::where('user_id', '=', auth()->user()->id)->count();
        return response()->json(['count' => $count]);
        
    }
}
