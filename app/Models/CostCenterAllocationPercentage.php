<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CostCenterAllocationPercentage extends Model
{
    use HasFactory;

    protected $table = 'cost_center_allocation_percentage';

    protected $fillable = [
        'name',
        'creation',
        'modified',
        'modified_by',
        'owner',
        'docstatus',
        'idx',
        'parent',
        'parentfield',
        'parenttype',
        'parent_id',
        'cost_center_id',
        'percentage'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'percentage' => 'decimal:2',
    ];

    public function costCenterAllocation()
    {
        return $this->belongsTo(CostCenterAllocation::class, 'parent_id');
    }

    public function costCenter()
    {
        return $this->belongsTo(CostCenter::class);
    }
}
