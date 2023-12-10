<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Category;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Inbox;
use App\Models\User;
class TransactionController extends Controller
{
    public function show(){
        if (Auth::id()===1){
            $transactions = Transaction::with('user')->where('status', 'pending')->get();
            
            return view('Admin/pending-transactions', ['transactions'=>$transactions]);
        }else{
            return 'This page is not accessable';
    }
    }

    public function add(){
        if(!Transaction::where('user_id', Auth::id())->where('status', 'pending')->first()){
            $transaction = new Transaction;
            $transaction->user_id = Auth::id();
            $transaction->cart_id = Cart::where('user_id', Auth::id())->first()['id'];
            $transaction->status = 'pending';
            $transaction->currency = 'GEL';
            $transaction->amount = CartItem::where('user_id', Auth::id())->where('active', 1)->get()->sum(function($cartItem) {
                return $cartItem->price;
            });
            $transaction->save();

            CartItem::where('user_id', Auth::id())->update(['active' => 0]);
            Cart::where('user_id', Auth::id())->update(['active' => 0]);
        }
        return redirect()->back();

    }



    public function destroy($id){
        $product = Product::where('id', $id)->first();
        $product->delete();

        return redirect()->back();
    }


    public function update($id, Request $request){
        $transaction = Transaction::where('id', $id)->first();
        $transaction->update(['status' => $request->input('status')]);
        
        $message = new Inbox;
        $message->user_id = User::where('id', $transaction["user_id"])->first()['id'];
        $message->subject = 'Transaction Status';

        if($request->input('status') == 'success'){
           $message->body = 'Your Transaction was successfull!';
        }
        else if($request->status == 'failed'){
            $message->body = 'Your Transaction has failed!';
        }
        $message->save();
        return redirect('/admin/pending-transactions');
    }
}
