<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MUnit_Color extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'MUnit_Color';
    protected $id = 'ColorId';
    protected $guarded = ['ColorId'];
    protected $dates = ['deleted_at'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters ?? false, function ($query, $filters) {
            $query->when($filters['searchBy'] ?? false, function ($query, $searchBy) {
                return $query->where(request('searchBy'), 'like', '%' . request('search') . '%');
            });

            $query->when($filters['search'] ?? false, function ($query, $search) {
                return $query->where('ColorCode', 'like', '%' . request('search') . '%');
            });
        });
    }

    public function getRouteKeyName()
    {
        return 'ColorId';
    }
}
