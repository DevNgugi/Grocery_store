<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class CategoryController extends Controller
{


    public function index(){
        $categories=Category::all();
        return view('admin.product-categories', compact('categories'));

    }
    public function getcategory(Request $request){
    try{
        $category=Category::where('id', '=',$request->input('id'))->get();
        // return response()->json($category);
        return response()->json($category);
    }
    catch (\Throwable $th) {
        //throw $th;
        return response()->json(['error' => $th->getMessage()]);
    }
    }

    public function addCategory(Request $request)
    {
        //
        if($request->input('id') != null){
            $category = Category::find($request->input('id'));
            $category->title = $request->input('title');
            $category->description = $request->input('description');
            $category->save();
            return redirect('/product-categories')->with('status', 'Category Updated Successfully');
        }
        $category = new Category;
        $category->title = $request->input('title');
        $category->description = $request->input('description');
        $category->save();
        return redirect('/product-categories')->with('status', 'Category Added Successfully');
        

    }

 
    public function deletecategory(Request $request)
    {
        //
        $category = Category::find($request->input('id'));
        $category->delete();
        return redirect('/product-categories')->with('deleted', 'Category Deleted Successfully');
    }
 
   

}
