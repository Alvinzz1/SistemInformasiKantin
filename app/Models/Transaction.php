<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\History;
use App\Models\Product;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cart()
    {
        return $this->hasMany(Product::class);
    }
    
    public function detail()
    {
        return $this->hasMany(History::class);
    }

    public function history()
    {
        return $this->hasMany(History::class, 'transaction_id', 'id');
    }

    public function getMonthAttribute()
    {
        return Carbon::parse($this->created_at)->month;
    }
}
