<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;

    protected $table = 'voucher';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'nota',
        'tglvbbm',
        'is_used'
    ];

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
}
