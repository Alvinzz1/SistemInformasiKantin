<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class History extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');

        // $history = History::find(1); // mencari data history dengan id 1
        // $product = $history->product; // mengakses data product yang terkait dengan history tersebut
        // $transaction = $history->transaction; // mengakses data transaction yang terkait dengan history tersebut

    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id', 'id');
    }

    
}
