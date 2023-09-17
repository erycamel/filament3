<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\MUnit_Color;
use App\Models\MUnit_VehicleType;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MUnit_VehicleTypeColor extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'MUnit_VehicleTypeColor';
    protected $id = 'VehicleTypeColorId';
    protected $guarded = ['VehicleTypeColorId'];
    protected $dates = ['deleted_at'];
    protected $with = ['MUnit_Color', 'MUnit_VehicleType', 'MUnit_VehicleType.MUnit_VehicleModel'];

    public function scopeVehicleModel($query)
    {
        return $query->whereHas('MUnit_VehicleType.MUnit_VehicleModel', function ($query) {
            $query->where(request('searchBy'), 'like', '%' . request('search') . '%');
        });
    }

    public function scopeVehicleType($query)
    {
        return $query->whereHas('MUnit_VehicleType', function ($query) {
            $query->where(request('searchBy') ?? 'KatashikiCode', 'like', '%' . request('search') . '%');
        });
    }

    public function scopeColor($query)
    {
        return $query->whereHas('MUnit_Color', function ($query) {
            $query->where(request('searchBy'), 'like', '%' . request('search') . '%');
        });
    }

    public function MUnit_Color(): BelongsTo
    {
        return $this->belongsTo(MUnit_Color::class, 'ColorId', 'ColorId');
    }

    public function MUnit_VehicleType(): BelongsTo
    {
        return $this->belongsTo(MUnit_VehicleType::class, 'VehicleTypeId', 'VehicleTypeId');
    }

    public function getRouteKeyName()
    {
        return 'VehicleTypeColorId';
    }
}
