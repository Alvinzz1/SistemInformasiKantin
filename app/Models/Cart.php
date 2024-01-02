<?php

namespace App\Models;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class cart extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    public function product()
    {   
       return $this->belongsTo(Product::class);
    }

    // public function carts(): HasMany
    // {
    //     return $this->hasMany(Cart::class);
    // }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
