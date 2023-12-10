<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use App\Models\CartItem;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function show()
    {   
        $cartItems = CartItem::where('user_id', Auth::id())->where('active', 1)->with('product')->get();
        $totalPrice = $cartItems->sum(function($cartItem) {
            return $cartItem->price;
        });
        return view('cart', [
            'totalprice'=>$totalPrice,
            'cartItems'=>$cartItems,
        ]);
    }

    public function add($id)
    {   
            try {
                
                $cart =  Cart::where('active', 1)->firstOrNew(['user_id' => Auth::id()]);
                $cart->user_id = Auth::id();
                $cart->save();
                $cartItem = new CartItem();
                $cartItem->product_id = $id;
                $cartItem->user_id = Auth::id();
                $cartItem->cart_id = $cart->id;
                $cartItem->price = Product::where('id', $id)->first()->price;
                $cartItem->save();
                
            } catch (\Illuminate\Database\QueryException $ex) {
                if ($ex->getCode() == 23000) {
                    session()->flash('error', 'Product already in cart');
                    return $cart;
                }
            }
            session()->flash('success', 'Product added to cart');
            return redirect()->back();
    }



    public function destroy($id){
        $cartItem = CartItem::where('product_id', $id)->first();
        $cartItem->delete();
        return redirect()->back();      
    }
}
