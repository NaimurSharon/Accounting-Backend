<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PricingRule extends Model
{
    use HasFactory;

    protected $table = 'pricing_rule';

    protected $fillable = [
        'name',
        'creation',
        'modified',
        'modified_by',
        'owner',
        'docstatus',
        'idx',
        'title',
        'disable',
        'apply_on', // ENUM
        'price_or_product_discount', // ENUM
        'warehouse_id',
        'items', // Child table
        'item_groups', // Child table
        'brands', // Child table
        'mixed_conditions',
        'is_cumulative',
        'coupon_code_based',
        'apply_rule_on_other', // ENUM
        'other_item_code_id',
        'other_item_group_id',
        'other_brand_id',
        'selling',
        'buying',
        'applicable_for', // ENUM
        'customer_id',
        'customer_group_id',
        'territory_id',
        'sales_partner_id',
        'campaign_id',
        'supplier_id',
        'supplier_group_id',
        'min_qty',
        'max_qty',
        'min_amt',
        'max_amt',
        'valid_from',
        'valid_upto',
        'company_id',
        'currency_id',
        'margin_type', // ENUM
        'margin_rate_or_amount',
        'rate_or_discount', // ENUM
        'apply_discount_on', // ENUM
        'rate',
        'discount_amount',
        'discount_percentage',
        'for_price_list_id',
        'same_item',
        'free_item_id',
        'free_qty',
        'free_item_uom_id',
        'free_item_rate',
        'threshold_percentage',
        'priority', // ENUM
        'apply_multiple_pricing_rules',
        'apply_discount_on_rate',
        'validate_applied_rule',
        'rule_description',
        'promotional_scheme_id', // VARCHAR but ID reference?
        'condition',
        'is_recursive',
        'naming_series',
        'round_free_qty',
        'recurse_for',
        'apply_recursion_over',
        'has_priority',
        'dont_enforce_free_item_qty'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'valid_from' => 'date',
        'valid_upto' => 'date',
        'min_qty' => 'decimal:2',
        'max_qty' => 'decimal:2',
        'min_amt' => 'decimal:2',
        'max_amt' => 'decimal:2',
        'margin_rate_or_amount' => 'decimal:2',
        'rate' => 'decimal:2',
        'discount_amount' => 'decimal:2',
        'discount_percentage' => 'decimal:2',
        'free_qty' => 'decimal:2',
        'free_item_rate' => 'decimal:2',
        'threshold_percentage' => 'decimal:2',
        'recurse_for' => 'decimal:2',
        'apply_recursion_over' => 'decimal:2',
        'disable' => 'boolean',
        'mixed_conditions' => 'boolean',
        'is_cumulative' => 'boolean',
        'coupon_code_based' => 'boolean',
        'selling' => 'boolean',
        'buying' => 'boolean',
        'same_item' => 'boolean',
        'apply_multiple_pricing_rules' => 'boolean',
        'apply_discount_on_rate' => 'boolean',
        'validate_applied_rule' => 'boolean',
        'is_recursive' => 'boolean',
        'round_free_qty' => 'boolean',
        'has_priority' => 'boolean',
        'dont_enforce_free_item_qty' => 'boolean',
    ];

    public function brandsRelation()
    {
        return $this->hasMany(PricingRuleBrand::class, 'parent_id');
    }

    public function itemCodesRelation()
    {
        return $this->hasMany(PricingRuleItemCode::class, 'parent_id');
    }

    public function itemGroupsRelation()
    {
        return $this->hasMany(PricingRuleItemGroup::class, 'parent_id');
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('disable', 0);
    }

    public function scopeValidDate($query, $date = null)
    {
        $date = $date ?: now();
        return $query->where(function ($q) use ($date) {
            $q->where('valid_from', '<=', $date)
                ->orWhereNull('valid_from');
        })->where(function ($q) use ($date) {
            $q->where('valid_upto', '>=', $date)
                ->orWhereNull('valid_upto');
        });
    }

    public function scopeSelling($query)
    {
        return $query->where('selling', 1);
    }

    public function scopeBuying($query)
    {
        return $query->where('buying', 1);
    }
}
