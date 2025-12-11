<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromotionalScheme extends Model
{
    use HasFactory;

    protected $table = 'promotional_scheme';

    protected $fillable = [
        'name',
        'creation',
        'modified',
        'modified_by',
        'owner',
        'docstatus',
        'idx',
        'apply_on', // ENUM
        'disable',
        'items', // Child table
        'item_groups', // Child table
        'brands', // Child table
        'mixed_conditions',
        'is_cumulative',
        'apply_rule_on_other', // ENUM
        'other_item_code_id',
        'other_item_group_id',
        'other_brand_id',
        'selling',
        'buying',
        'applicable_for', // ENUM
        'customer', // VARCHAR? should be customer_id? Schema says customer VARCHAR(255)
        'customer_group',
        'territory',
        'sales_partner',
        'campaign',
        'supplier',
        'supplier_group',
        'valid_from',
        'valid_upto',
        'company_id',
        'currency_id',
        'price_discount_slabs', // Child table
        'product_discount_slabs' // Child table
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'valid_from' => 'date',
        'valid_upto' => 'date',
        'disable' => 'boolean',
        'mixed_conditions' => 'boolean',
        'is_cumulative' => 'boolean',
        'selling' => 'boolean',
        'buying' => 'boolean',
    ];

    public function priceDiscountSlabs()
    {
        return $this->hasMany(PromotionalSchemePriceDiscount::class, 'parent_id');
    }

    public function productDiscountSlabs()
    {
        return $this->hasMany(PromotionalSchemeProductDiscount::class, 'parent_id');
    }
}
