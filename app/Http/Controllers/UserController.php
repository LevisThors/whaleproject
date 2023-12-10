<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Transaction;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    
    public function show(){
        if (Auth::id()===1){
            $users = User::with('transactions')->get();
            
            return view('Admin/admin-users', ['users'=>$users]);
        }else{
            return 'This page is not accessable';
    }
    }
}

