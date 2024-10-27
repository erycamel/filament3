<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Glcoa extends Model
{
    protected $table = 'glcoa';
    protected $primaryKey = 'pk';
    protected $guarded = ['pk'];
    public $timestamps = false;

    public function hydrate(array $objects): Collection
    {
        return parent::hydrate(
            array_map(function ($object) {
                foreach ($object as $k => $v) {
                    if (is_string($v)) {
                        $object->$k = trim($v);
                    }
                }

                return $object;
            }, $objects)
        );
    }

    public function scopeFilter($query, array $filters)
    {
        $search = $filters['search'] ?? false;
        $pk     = $filters['pk'] ?? false;

        $query->when($search, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query
                    ->where('naper', 'like', '%' . $search . '%')
                    ->orWhere('noper', 'like', '%' . $search . '%');
            });
        });

        $query->when($pk, function ($query, $pk) {
            $query->where('pk', $pk);
        });
    }
    // Other model properties and methods

    /**
     * Get the noper attribute with spaces trimmed.
     *
     * @param  string  $value
     * @return string
     */
    public function getNoperAttribute($value)
    {
        return trim($value);
    }

    /**
     * Set the noper attribute with spaces trimmed.
     *
     * @param  string  $value
     * @return void
     */
    public function setNoperAttribute($value)
    {
        $this->attributes['noper'] = trim($value);
    }
}
