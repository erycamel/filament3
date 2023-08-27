<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory, softDeletes;
    protected $fillable = [
        'customer_id', 'number', 'total_price', 'status', 'shipping_price', 'notes'
    ];

    public function customer(): BelongTo
    {
        return $this->belongTo(Customer::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(orderItem::class);
    }
}
