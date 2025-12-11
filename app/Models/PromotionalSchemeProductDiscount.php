<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromotionalSchemeProductDiscount extends Model
{
    use HasFactory;

    protected $table = 'promotional_scheme_product_discount';

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
        'same_item',
        'free_item_id',
        'free_qty',
        'free_item_uom_id',
        'free_item_rate',
        'warehouse_id',
        'threshold_percentage',
        'priority', // ENUM
        'apply_multiple_pricing_rules',
        'is_recursive',
        'recurse_for',
        'apply_recursion_over',
        'round_free_qty'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'min_qty' => 'decimal:2',
        'max_qty' => 'decimal:2',
        'min_amount' => 'decimal:2',
        'max_amount' => 'decimal:2',
        'free_qty' => 'decimal:2',
        'free_item_rate' => 'decimal:2',
        'threshold_percentage' => 'decimal:2',
        'recurse_for' => 'decimal:2',
        'apply_recursion_over' => 'decimal:2',
        'disable' => 'boolean',
        'same_item' => 'boolean',
        'apply_multiple_pricing_rules' => 'boolean',
        'is_recursive' => 'boolean',
        'round_free_qty' => 'boolean',
    ];

    public function promotionalScheme()
    {
        return $this->belongsTo(PromotionalScheme::class, 'parent_id');
    }
}
