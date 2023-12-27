<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        //get all categories
        $categories = Category::all();
        return view('admin.add-product', compact('categories'));
    }


    public function newproduct(Request $request)
    {
        //
        try {
            $product = new Product();
            $product->title = $request->input('title');
            $product->description = $request->input('description');
            $image = base64_encode(file_get_contents($request->file('url')));
            $product->url = $image;
            // $product->categories = json_encode($request->input('categories'));
            $product->status = $request->input('status');
            $product->price = $request->input('price');
            $product->save();
            // pivot table
            $product->categories()->attach(($request->input('categories')));

            return redirect()->route('add-product')->with('product_added', 'Product added successfully');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('add-product')->with('product_not_added', $th->getMessage());
        }
    }

    public function home(Request $request)
    {
        //
        $products = Product::all();
        // get categories
        $categories = Category::all();

        return view('home', compact('products', 'categories'));
    }


    public function list(Product $product)
    {
        //
        $products = Product::all();
        return view('admin.product-list', compact('products'));
    }

    public function deleteproduct(Request $request, $id)
    {
        //delete product by id

        $product = Product::find($id);
        // delete cart where product id = $id
        $product->categories()->detach();
        // get all cart items where product id = $id
        $cart= Cart::where('product_id', '=', $id)->get();
        // delete all cart items where product id = $id
        foreach ($cart as $item) {
            $item->delete();
        }
        $product->delete();
        return redirect('/product-list')->with('deleted', 'Product Deleted Successfully');
    }
    public function dashboard()
    {

        $orders = Order::where('user_id', '=', auth()->user()->id)->get();

        // reports
        // get total products in store and where status =1
        $total_products = Product::where('status', '=', 1)->count();
        // get total orders in store and where status =Delivered
        $total_pending = Order::where('status', '=', 'Pending')->count();
        $total_delivered = Order::where('status', '=', 'Delivered')->count();
        // get total sales in store and where status =Delivered
        $total_sales = Order::where('status', '=', 'Delivered')->sum('total');
        // return dashbbord view
        return view('admin.dashboard', compact('orders', 'total_products', 'total_pending', 'total_delivered', 'total_sales'));
    }

    public function filter(Request $request)
    {
        // if keywords is empty

        if ($request->input('keywords') == '') {
            //  return view home
            return redirect()->route('home');
        } else {
            $checked_categories = $request->input('checked_categories');
            $keywords = $request->input('keywords');
            $category = $request->input('category');
            $price_from = $request->input('price_from');
            $price_to = $request->input('price_to');

            try {

                $final_categories = json_decode($checked_categories);
                $search_products = Product::whereHas('categories', function ($query) use ($final_categories) {
                    $query->whereIn('category_id', $final_categories);
                    
                })
                ->orwhere('title', 'like', '%' . $keywords . '%')
                    ->orwhere('description', 'like', '%' . $keywords . '%')
                    ->where('price', '>=', $price_from)
                    ->where('price', '<=', $price_to)
                    ->get();
                    
                // return response json
                return response()->json($search_products);

            } catch (\Throwable $th) {
                //throw $th;
                return response()->json($th->getMessage());
            }
        }
    }

    public function productDetails($id){
        // get product details by id
        $product = Product::find($id);
        // return view product details
        return view('product-details', compact('product'));

    }
}
