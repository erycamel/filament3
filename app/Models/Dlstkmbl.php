<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dlstkmbl extends Model
{
	protected $table = 'dlstkmbl';
	protected $primaryKey = 'pk';
	public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
	protected $fillable = [
		'novoucher',
		'tglvbbm'
	];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'tglvbbm' => 'datetime'
    ];
}
