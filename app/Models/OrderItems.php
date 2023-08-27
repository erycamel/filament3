<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id', 'product_id', 'unit_price', 'quantity'
    ];

    public function customer(): BelongTo
    {
        return $this->belongTo(Customer::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(Customer::class);
    }
}
