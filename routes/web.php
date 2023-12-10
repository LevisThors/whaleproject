<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\AdminProductsController;



Route::get('/', [MainPageController::class, 'index']);
Route::get('/category/{category}', [CategoryController::class, 'index']);

Route::get('/admin', [AdminController::class, 'index']);
Route::get('/admin/transaction/{id}', [AdminController::class, 'showtransaction']);

Route::get('/admin/products', [AdminProductsController::class, 'show']);
Route::get('/admin/products-add', [AdminProductsController::class, 'add']);
Route::post('/admin/products/add', [AdminProductsController::class, 'addProduct']);
Route::get('/admin/edit-product/{id}', [AdminProductsController::class, 'showProduct']);
Route::put('/admin/update-product/{id}', [AdminProductsController::class, 'update']);
Route::delete('/admin/delete-product/{id}', [AdminProductsController::class, 'destroy']);
Route::get('/admin/users', [UserController::class, 'show']);


Route::get('/cart', [CartController::class, 'show']);
Route::post('/add-to-cart/{id}', [CartController::class, 'add']);
Route::delete('/delete-cart-item/{id}', [CartController::class, 'destroy']);


Route::post('/sign-up', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/admin/pending-transactions', [TransactionController::class, 'show']);
Route::post('/add-transaction', [TransactionController::class, 'add']);
Route::post('/admin/transaction-status/{id}', [TransactionController::class, 'update']);


Route::get('/register', function(){
    return view('register');
});

// SIGN IN
Route::get('/log-in', function(){
    return view('login');
});
