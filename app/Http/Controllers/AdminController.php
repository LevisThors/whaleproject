<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\CartItem;

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        if (Auth::id()===1){
            return view('Admin/admin');
        }else{
            return 'This page is not accessable';
    }
    }

    public function showtransaction($id)
    {
        $transaction = Transaction::where('id', $id)->first();
        $cart = CartItem::with('product')->where('cart_id', $transaction['cart_id'])->get();
        if($cart && $transaction){
            return view('Admin/single-transaction', ['transaction'=>$transaction, 'cart'=>$cart]);
        }

    }
    
}
