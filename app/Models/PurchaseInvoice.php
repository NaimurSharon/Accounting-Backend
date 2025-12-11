<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseInvoice extends Model
{
    use HasFactory;

    protected $table = 'purchase_invoice';

    protected $fillable = [
        'name',
        'creation',
        'modified',
        'modified_by',
        'owner',
        'docstatus',
        'idx',
        'title',
        'naming_series',
        'supplier_id',
        'supplier_name',
        'tax_id',
        'due_date',
        'is_paid',
        'is_return', // boolean
        'apply_tds', // boolean
        'company_id',
        'cost_center_id',
        'posting_date',
        'posting_time',
        'set_posting_time', // boolean
        'amended_from_id',
        'on_hold', // boolean
        'release_date',
        'hold_comment',
        'bill_no',
        'bill_date',
        'return_against_id',
        'update_billed_amount_in_purchase_order',
        'update_billed_amount_in_purchase_receipt',
        'supplier_address_id',
        'address_display',
        'contact_person_id',
        'contact_display',
        'contact_mobile',
        'contact_email',
        'shipping_address_id',
        'shipping_address_display',
        'currency_id',
        'conversion_rate',
        'buying_price_list_id',
        'price_list_currency_id',
        'plc_conversion_rate',
        'ignore_pricing_rule',
        'set_warehouse_id',
        'rejected_warehouse_id',
        'is_subcontracted',
        'update_stock',
        'scan_barcode',
        'items', // Child table
        'pricing_rules', // Child or JSON? Likely JSON/String
        'supplied_items', // Child table?
        'total_qty',
        'base_total',
        'base_net_total',
        'total',
        'net_total',
        'total_net_weight',
        'tax_category_id',
        'shipping_rule_id',
        'taxes_and_charges_id', // Template
        'taxes', // Child table
        'other_charges_calculation',
        'base_taxes_and_charges_added',
        'base_taxes_and_charges_deducted',
        'base_total_taxes_and_charges',
        'taxes_and_charges_added',
        'taxes_and_charges_deducted',
        'total_taxes_and_charges',
        'apply_discount_on', // ENUM
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
        'disable_rounded_total',
        'mode_of_payment_id',
        'cash_bank_account_id',
        'clearance_date',
        'paid_amount',
        'base_paid_amount',
        'write_off_amount',
        'base_write_off_amount',
        'write_off_account_id',
        'write_off_cost_center_id',
        'allocate_advances_automatically',
        'advances', // Child table
        'payment_terms_template_id',
        'payment_schedule',
        'tc_name_id',
        'terms',
        'letter_head_id',
        'group_same_items',
        'select_print_heading_id',
        'language',
        'is_internal_supplier',
        'credit_to_id', // Account
        'party_account_currency_id',
        'is_opening', // ENUM Yes/No
        'against_expense_account',
        'status', // ENUM
        'inter_company_invoice_reference_id',
        'remarks',
        'from_date',
        'to_date',
        'auto_repeat_id',
        'tax_withholding_category_id',
        'billing_address_id',
        'billing_address_display',
        'project_id',
        'unrealized_profit_loss_account_id',
        'represents_company_id',
        'set_from_warehouse_id',
        'supplier_warehouse_id',
        'per_received',
        'ignore_default_payment_terms_template',
        'advance_tax',
        'subscription_id',
        'is_old_subcontracting_flow', // boolean
        'tax_withholding_net_total',
        'base_tax_withholding_net_total',
        'tax_withheld_vouchers',
        'incoterm_id',
        'named_place',
        'only_include_allocated_payments',
        'use_company_roundoff_cost_center',
        'use_transaction_date_exchange_rate',
        'supplier_group_id',
        'update_outstanding_for_self',
        'sender',
        'dispatch_address_display',
        'dispatch_address_id',
        'last_scanned_warehouse',
        'claimed_landed_cost_amount',
        'item_wise_tax_details'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'due_date' => 'date',
        'posting_date' => 'date',
        'release_date' => 'date',
        'bill_date' => 'date',
        'clearance_date' => 'date',
        'from_date' => 'date',
        'to_date' => 'date',
        'is_paid' => 'boolean',
        'is_return' => 'boolean',
        'apply_tds' => 'boolean',
        'set_posting_time' => 'boolean',
        'on_hold' => 'boolean',
        'update_billed_amount_in_purchase_order' => 'boolean',
        'update_billed_amount_in_purchase_receipt' => 'boolean',
        'ignore_pricing_rule' => 'boolean',
        'is_subcontracted' => 'boolean',
        'update_stock' => 'boolean',
        'disable_rounded_total' => 'boolean',
        'allocate_advances_automatically' => 'boolean',
        'group_same_items' => 'boolean',
        'is_internal_supplier' => 'boolean',
        'ignore_default_payment_terms_template' => 'boolean',
        'is_old_subcontracting_flow' => 'boolean',
        'only_include_allocated_payments' => 'boolean',
        'use_company_roundoff_cost_center' => 'boolean',
        'use_transaction_date_exchange_rate' => 'boolean',
        'update_outstanding_for_self' => 'boolean',
        'is_opening' => 'boolean', // Mapped from ENUM Yes/No via mutator if needed, or treated as string "Yes"/"No"
        'total' => 'decimal:2',
        'net_total' => 'decimal:2',
        'grand_total' => 'decimal:2',
        'outstanding_amount' => 'decimal:2',
    ];

    // Accessor/Mutator for is_opening
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
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function itemsRelation()
    {
        return $this->hasMany(PurchaseInvoiceItem::class, 'parent_id');
    }

    public function taxesRelation()
    {
        return $this->hasMany(PurchaseTaxesAndCharges::class, 'parent_id');
    }

    public function advancesRelation()
    {
        return $this->hasMany(PurchaseInvoiceAdvance::class, 'parent_id');
    }
}
