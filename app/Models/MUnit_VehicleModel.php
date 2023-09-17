<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MUnit_VehicleModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'MUnit_VehicleModel';
    protected $id = 'VehicleModelId';
    protected $guarded = ['VehicleModelId'];
    protected $dates = ['deleted_at'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters ?? false, function ($query, $filters) {
            $query->when($filters['searchBy'] ?? false, function ($query, $searchBy) {
                return $query->where(request('searchBy'), 'like', '%' . request('search') . '%');
            });

            $query->when($filters['search'] ?? false, function ($query, $search) {
                return $query->where('VehicleModelCode', 'like', '%' . request('search') . '%');
            });
        });
    }

    public function getRouteKeyName()
    {
        return 'VehicleModelCode';
    }
}
