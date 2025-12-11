<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;

    protected $table = 'warehouse';
    protected $guarded = [];

    protected $casts = [
        'is_group' => 'boolean',
        'disabled' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('disabled', 0);
    }

    public function scopeGroup($query)
    {
        return $query->where('is_group', 1);
    }

    public function scopeLeaf($query)
    {
        return $query->where('is_group', 0);
    }

    public function parentWarehouse()
    {
        return $this->belongsTo(Warehouse::class, 'parent_warehouse');
    }

    public function children()
    {
        return $this->hasMany(Warehouse::class, 'parent_warehouse');
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
