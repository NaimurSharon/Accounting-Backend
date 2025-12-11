<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromotionalSchemePriceDiscount extends Model
{
    use HasFactory;

    protected $table = 'promotional_scheme_price_discount';

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
        'disable',
        'rule_description',
        'min_qty',
        'max_qty',
        'min_amount',
        'max_amount',
        'rate_or_discount', // ENUM
        'rate',
        'discount_amount',
        'discount_percentage',
        'for_price_list_id',
        'warehouse_id',
        'threshold_percentage',
        'validate_applied_rule',
        'priority', // ENUM
        'apply_multiple_pricing_rules',
        'apply_discount_on_rate'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'min_qty' => 'decimal:2',
        'max_qty' => 'decimal:2',
        'min_amount' => 'decimal:2',
        'max_amount' => 'decimal:2',
        'rate' => 'decimal:2',
        'discount_amount' => 'decimal:2',
        'discount_percentage' => 'decimal:2',
        'threshold_percentage' => 'decimal:2',
        'disable' => 'boolean',
        'validate_applied_rule' => 'boolean',
        'apply_multiple_pricing_rules' => 'boolean',
        'apply_discount_on_rate' => 'boolean',
    ];

    public function promotionalScheme()
    {
        return $this->belongsTo(PromotionalScheme::class, 'parent_id');
    }
}
