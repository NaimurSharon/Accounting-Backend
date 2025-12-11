<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CostCenterAllocation extends Model
{
    use HasFactory;

    protected $table = 'cost_center_allocation';

    protected $fillable = [
        'name',
        'creation',
        'modified',
        'modified_by',
        'owner',
        'docstatus',
        'idx',
        'main_cost_center_id',
        'valid_from',
        'company_id',
        'allocation_percentages',
        'amended_from_id'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'valid_from' => 'date',
    ];

    public function mainCostCenter()
    {
        return $this->belongsTo(CostCenter::class, 'main_cost_center_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function percentages()
    {
        return $this->hasMany(CostCenterAllocationPercentage::class, 'parent_id');
    }
}
