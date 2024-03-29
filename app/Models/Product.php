<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'brand_id', 'name', 'slug', 'sku', 'description', 'image',
        'quantity', 'price', 'is_visible', 'is_featured', 'type', 'published_at'
    ];

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function categories(): BelongToMany
    {
        return $this->belongToMany(Category::class)->withTimestamp();
    }

}
