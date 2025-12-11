<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesInvoice extends Model
{
    use HasFactory;

    protected $table = 'sales_invoice';

    protected $fillable = [
        'name',
        'creation',
        'modified',
        'modified_by',
        'owner',
        'docstatus',
        'idx',
        'naming_series',
        'customer_id',
        'customer_name',
        'tax_id',
        'project_id',
        'is_pos',
        'pos_profile_id',
        'is_return',
        'company_id',
        'cost_center_id',
        'posting_date',
        'posting_time',
        'set_posting_time',
        'due_date',
        'amended_from_id',
        'return_against_id',
        'update_billed_amount_in_sales_order',
        'po_no',
        'po_date',
        'customer_address_id',
        'address_display',
        'contact_person_id',
        'contact_display',
        'contact_mobile',
        'contact_email',
        'territory_id',
        'shipping_address_name_id',
        'shipping_address',
        'company_address_id',
        'company_address_display',
        'currency_id',
        'conversion_rate',
        'selling_price_list_id',
        'price_list_currency_id',
        'plc_conversion_rate',
        'ignore_pricing_rule',
        'set_warehouse_id',
        'update_stock',
        'scan_barcode',
        'items', // Child
        'pricing_rules', // Child?
        'packed_items',
        'timesheets',
        'total_billing_amount',
        'total_qty',
        'base_total',
        'base_net_total',
        'total',
        'net_total',
        'total_net_weight',
        'taxes_and_charges_id',
        'shipping_rule_id',
        'tax_category_id',
        'taxes', // Child
        'other_charges_calculation',
        'base_total_taxes_and_charges',
        'total_taxes_and_charges',
        'loyalty_points',
        'loyalty_amount',
        'redeem_loyalty_points',
        'loyalty_program_id',
        'loyalty_redemption_account_id',
        'loyalty_redemption_cost_center_id',
        'apply_discount_on',
        'base_discount_amount',
        'additional_discount_percentage',
        'discount_amount',
        'base_grand_total',
        'base_rounding_adjustment',
        'base_rounded_total',
        'base_in_words',
        'grand_total',
        'rounding_adjustment',
        'rounded_total',
        'in_words',
        'total_advance',
        'outstanding_amount',
        'allocate_advances_automatically',
        'advances', // Child
        'payment_terms_template_id',
        'payment_schedule',
        'cash_bank_account_id',
        'payments', // Child
        'base_paid_amount',
        'paid_amount',
        'base_change_amount',
        'change_amount',
        'account_for_change_amount_id',
        'write_off_amount',
        'base_write_off_amount',
        'write_off_outstanding_amount_automatically',
        'write_off_account_id',
        'write_off_cost_center_id',
        'tc_name_id',
        'terms',
        'letter_head_id',
        'group_same_items',
        'language_id',
        'select_print_heading_id',
        'inter_company_invoice_reference_id',
        'customer_group_id',
        'is_discounted',
        'status', // ENUM
        'debit_to_id',
        'party_account_currency_id',
        'is_opening', // ENUM
        'remarks',
        'sales_partner_id',
        'commission_rate',
        'total_commission',
        'sales_team',
        'from_date',
        'to_date',
        'auto_repeat_id',
        'against_income_account',
        'is_consolidated',
        'is_internal_customer',
        'company_tax_id',
        'unrealized_profit_loss_account_id',
        'represents_company_id',
        'set_target_warehouse_id',
        'is_debit_note',
        'disable_rounded_total',
        'additional_discount_account_id',
        'dispatch_address_name_id',
        'dispatch_address',
        'ignore_default_payment_terms_template',
        'total_billing_hours',
        'amount_eligible_for_commission',
        'subscription_id',
        'is_cash_or_non_trade_discount',
        'incoterm_id',
        'named_place',
        'only_include_allocated_payments',
        'use_company_roundoff_cost_center',
        'update_billed_amount_in_delivery_note',
        'dont_create_loyalty_points',
        'coupon_code_id',
        'update_outstanding_for_self',
        'utm_medium_id',
        'utm_content',
        'utm_campaign_id',
        'utm_source_id',
        'company_contact_person_id',
        'is_created_using_pos',
        'pos_closing_entry_id',
        'last_scanned_warehouse',
        'has_subcontracted',
        'item_wise_tax_details'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'posting_date' => 'date',
        'due_date' => 'date',
        'po_date' => 'date',
        'from_date' => 'date',
        'to_date' => 'date',
        'is_pos' => 'boolean',
        'is_return' => 'boolean',
        'update_billed_amount_in_sales_order' => 'boolean',
        'ignore_pricing_rule' => 'boolean',
        'update_stock' => 'boolean',
        'redeem_loyalty_points' => 'boolean',
        'allocate_advances_automatically' => 'boolean',
        'write_off_outstanding_amount_automatically' => 'boolean',
        'group_same_items' => 'boolean',
        'is_discounted' => 'boolean',
        'is_opening' => 'boolean', // ENUM handling
        'is_consolidated' => 'boolean',
        'is_internal_customer' => 'boolean',
        'is_debit_note' => 'boolean',
        'disable_rounded_total' => 'boolean',
        'ignore_default_payment_terms_template' => 'boolean',
        'is_cash_or_non_trade_discount' => 'boolean',
        'only_include_allocated_payments' => 'boolean',
        'use_company_roundoff_cost_center' => 'boolean',
        'update_billed_amount_in_delivery_note' => 'boolean',
        'dont_create_loyalty_points' => 'boolean',
        'update_outstanding_for_self' => 'boolean',
        'is_created_using_pos' => 'boolean',
        'has_subcontracted' => 'boolean',
        'grand_total' => 'decimal:2',
        'total' => 'decimal:2',
        'net_total' => 'decimal:2',
        'outstanding_amount' => 'decimal:2',
    ];

    public function getIsOpeningAttribute($value)
    {
        return $value === 'Yes';
    }

    public function setIsOpeningAttribute($value)
    {
        $this->attributes['is_opening'] = $value ? 'Yes' : 'No';
    }

    // Helpers
    public function isPaid()
    {
        return $this->outstanding_amount <= 0;
    }

    public function isOverdue()
    {
        return !$this->isPaid() && $this->due_date < now();
    }

    // Relationships
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function itemsRelation()
    {
        return $this->hasMany(SalesInvoiceItem::class, 'parent_id');
    }

    public function taxesRelation()
    {
        return $this->hasMany(SalesTaxesAndCharges::class, 'parent_id');
    }

    public function paymentsRelation()
    {
        return $this->hasMany(SalesInvoicePayment::class, 'parent_id');
    }

    public function advancesRelation()
    {
        return $this->hasMany(SalesInvoiceAdvance::class, 'parent_id');
    }
}
