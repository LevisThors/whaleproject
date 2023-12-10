<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class AdminProductsController extends Controller
{
    public function show()
    {   
        if (Auth::id()===1){
            $products = Product::all();
            return view('Admin/admin-products', ['products'=>$products]);
        }else{
            return 'This page is not accessable';
    }
    }

    public function add(){
        if (Auth::id()===1){
            $products = Product::with('category')->get();
            $categories = Category::all();
            
            return view('Admin/add-product', ['products'=>$products,
        'categories'=>$categories]);
        }else{
            return 'This page is not accessable';
    }
    }

    public function destroy($id){
        if (Auth::id()===1){
            $product = Product::where('id', $id)->first();
            $product->delete();
           
            
            return redirect()->back();
        }else{
            return 'This page is not accessable';
    }
    }

    public function addProduct(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'details' => 'required',
            'image' => 'required|image',
            'price' => 'required',
            'category'=>'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->details = $request->details;
        $product->image = $request->file('image')->store('images', 'public');
        $product->price = $request->price;
        $product->category_id = $request->category;
        $product->save();
        return $product;
    }


    public function showProduct($id){
        $categories = Category::all();
        $product = Product::find($id)->first();
        return view('Admin/edit-product', ['product'=>$product, 'categories'=>$categories]);
    }

    public function update(Request $request, $id){  
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'details' => 'required',
            'image' => 'required|image',
            'price' => 'required',
            'category'=>'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $product = Product::find($id)->first();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->details = $request->details;
        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($product->image);
            $product->image = $request->file('image')->store('images', 'public');
        }
        $product->price = $request->price;
        $product->category_id = $request->category;
        $product->save();
        return $product;
}
}