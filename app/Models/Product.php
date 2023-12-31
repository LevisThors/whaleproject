<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\CartItem;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];  
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function cart_items(){
        return $this->hasMany(CartItem::class);
    }


}
