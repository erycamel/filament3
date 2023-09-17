<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class MUnit_DeliveryOrderTAM extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'MUnit_DeliveryOrderTAM';
    protected $id = 'DeliveryOrderTAMId';
    protected $guarded = ['DeliveryOrderTAMId'];
    protected $dates = ['deleted_at'];
    protected $with = ['MUnit_VehicleTypeColor', 'MUnit_VehicleTypeColor.MUnit_VehicleType', 'MUnit_VehicleTypeColor.MUnit_Color', 'MUnit_VehicleTypeColor.MUnit_VehicleType.MUnit_VehicleModel'];

    public function scopeFilter($query, $filters)
    {
        $query->when($filters ?? false, function ($query, $filters) {
            $query->when($filters['search'] ?? false, function ($query, $search) {
                return $query->where(request('searchBy') ?? 'FrameNo', 'like', '%' . request('search') . '%');
            });
        });
    }

    public function MUnit_VehicleTypeColor(): BelongsTo
    {
        return $this->belongsTo(MUnit_VehicleTypeColor::class, 'VehicleTypeColorId', 'VehicleTypeColorId');
    }

    public function getRouteKeyName()
    {
        return 'DeliveryOrderTAMId';
    }
}
