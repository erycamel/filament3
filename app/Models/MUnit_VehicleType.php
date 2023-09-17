<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MUnit_VehicleModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class MUnit_VehicleType extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'MUnit_VehicleType';
    protected $id = 'VehicleTypeId';
    protected $guarded = ['VehicleTypeId'];
    protected $dates = ['deleted_at'];
    protected $with = ['MUnit_VehicleModel'];

    public function scopeVehicleModel($query)
    {
        return $query->whereHas('MUnit_VehicleModel', function ($query) {
            $query->where(request('searchBy'), 'like', '%' . request('search') . '%');
        });
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters ?? false, function ($query, $filters) {
            $query->when($filters['search'] ?? false, function ($query, $search) {
                return $query->where(request('searchBy') ?? 'KatashikiCode', 'like', '%' . request('search') . '%');
            });
        });
    }

    public function MUnit_VehicleModel(): BelongsTo
    {
        return $this->belongsTo(MUnit_VehicleModel::class, 'VehicleModelId', 'VehicleModelId');
    }

    public function getRouteKeyName()
    {
        return 'VehicleTypeId';
    }
}
