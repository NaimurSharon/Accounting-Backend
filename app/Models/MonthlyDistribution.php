<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonthlyDistribution extends Model
{
    use HasFactory;

    protected $table = 'monthly_distribution';

    protected $fillable = [
        'name',
        'creation',
        'modified',
        'modified_by',
        'owner',
        'docstatus',
        'idx',
        'distribution_id', // ID string usually
        'fiscal_year_id',
        'percentages' // JSON? No, child table
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
    ];

    public function fiscalYear()
    {
        return $this->belongsTo(FiscalYear::class);
    }

    public function percentagesRelation()
    {
        return $this->hasMany(MonthlyDistributionPercentage::class, 'parent_id');
    }
}
