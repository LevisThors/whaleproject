<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Inbox;
use Illuminate\Support\Facades\Auth;


class MainPageController extends Controller
{
    public function index()
    {   
        $categories = Category::all();
        return view('main-page', ['categories'=>$categories]);
    }
}
