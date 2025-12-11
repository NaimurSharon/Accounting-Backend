<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaxWithholdingRate extends Model
{
    use HasFactory;

    protected $table = 'tax_withholding_rate';

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
        'tax_withholding_rate',
        'single_threshold',
        'cumulative_threshold',
        'from_date',
        'to_date'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'tax_withholding_rate' => 'decimal:2',
        'single_threshold' => 'decimal:2',
        'cumulative_threshold' => 'decimal:2',
        'from_date' => 'date',
        'to_date' => 'date',
    ];

    public function category()
    {
        return $this->belongsTo(TaxWithholdingCategory::class, 'parent_id');
    }
}
