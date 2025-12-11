<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PosProfile extends Model
{
    use HasFactory;

    protected $table = 'pos_profile';

    protected $fillable = [
        'name',
        'creation',
        'modified',
        'modified_by',
        'owner',
        'docstatus',
        'idx',
        'disabled',
        'customer_id',
        'company_id',
        'country',
        'company_address_id',
        'applicable_for_users',
        'payments', // Child table `pos_payment_method`
        'item_groups', // Child table `pos_item_group`
        'customer_groups', // Child table `pos_customer_group`
        'letter_head_id',
        'tc_name_id',
        'select_print_heading_id',
        'selling_price_list_id',
        'currency_id',
        'write_off_account_id',
        'write_off_cost_center_id',
        'account_for_change_amount_id',
        'income_account_id',
        'expense_account_id',
        'cost_center_id',
        'taxes_and_charges_id',
        'apply_discount_on',
        'tax_category_id',
        'print_format_id',
        'warehouse_id',
        'ignore_pricing_rule',
        'update_stock',
        'hide_unavailable_items',
        'hide_images',
        'auto_add_item_to_cart',
        'allow_rate_change',
        'allow_discount_change',
        'validate_stock_on_save',
        'write_off_limit',
        'disable_rounded_total',
        'utm_campaign_id',
        'utm_source_id',
        'utm_medium_id',
        'print_receipt_on_order_complete',
        'project_id',
        'set_grand_total_to_default_mop',
        'action_on_new_invoice',
        'allow_partial_payment'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'disabled' => 'boolean',
        'ignore_pricing_rule' => 'boolean',
        'update_stock' => 'boolean',
        'hide_unavailable_items' => 'boolean',
        'hide_images' => 'boolean',
        'auto_add_item_to_cart' => 'boolean',
        'allow_rate_change' => 'boolean',
        'allow_discount_change' => 'boolean',
        'validate_stock_on_save' => 'boolean',
        'write_off_limit' => 'decimal:2',
    ];

    public function paymentMethods()
    {
        return $this->hasMany(PosPaymentMethod::class, 'parent_id');
    }

    public function itemGroupsRelation()
    {
        return $this->hasMany(PosItemGroup::class, 'parent_id');
    }

    public function customerGroupsRelation()
    {
        return $this->hasMany(PosCustomerGroup::class, 'parent_id');
    }

    public function users()
    {
        return $this->hasMany(PosProfileUser::class, 'parent_id');
    }

    public function scopeActive($query)
    {
        return $query->where('disabled', 0);
    }
}
