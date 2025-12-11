<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonthlyDistributionPercentage extends Model
{
    use HasFactory;

    protected $table = 'monthly_distribution_percentage';

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
        'month',
        'percentage_allocation'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'percentage_allocation' => 'decimal:2',
    ];

    public function monthlyDistribution()
    {
        return $this->belongsTo(MonthlyDistribution::class, 'parent_id');
    }
}
