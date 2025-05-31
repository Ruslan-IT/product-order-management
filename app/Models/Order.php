<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'created_at',
        'status',
        'comment',
        'product_id',
        'quantity'
    ];

    protected $attributes = [
        'status' => 'new',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getTotalPriceAttribute()
    {
        return $this->product->price * $this->quantity;
    }
}
