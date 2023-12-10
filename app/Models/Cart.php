<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\User;
use App\Models\CartItem;
use App\Models\Transaction;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = ['user_id'];

    public function cart_items()
    {
        return $this->hasMany(CartItem::class);
    }

    public function user()
    {
        return $this->belongsToMany('App\Models\User');
    }

    public function transactions()
    {
        return $this->belongsToMany(Transaction::class);
    }
}
