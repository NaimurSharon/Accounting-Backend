<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PosInvoice extends Model
{
    use HasFactory;

    protected $table = 'pos_invoice';

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
        'is_pos',
        'pos_profile_id',
        'is_return',
        'company_id',
        'posting_date',
        'posting_time',
        'set_posting_time',
        'due_date',
        'amended_from_id',
        'return_against_id',
        'update_billed_amount_in_sales_order',
        'project_id',
        'cost_center_id',
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
        'items',
        'pricing_rules',
        'packed_items',
        'timesheets',
        'total_billing_amount',
        'total_qty',
        'base_total',
        'base_net_total',
        'total',
        'net_total',
        'total_net_weight',
        'taxes_and_charges_id', // SalesTaxesAndChargesTemplate
        'shipping_rule_id',
        'tax_category_id',
        'taxes', // Sales Taxes and Charges table
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
        'advances',
        'payment_terms_template_id',
        'payment_schedule',
        'cash_bank_account_id',
        'payments', // Sales Invoice Payment table
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
        'language',
        'select_print_heading_id',
        'inter_company_invoice_reference_id',
        'customer_group_id',
        'is_discounted',
        'status',
        'debit_to_id', // Account?
        'party_account_currency_id',
        'is_opening',
        'remarks',
        'sales_partner_id',
        'commission_rate',
        'total_commission',
        'sales_team',
        'from_date',
        'to_date',
        'auto_repeat_id',
        'against_income_account',
        'consolidated_invoice_id',
        'coupon_code_id',
        'amount_eligible_for_commission',
        'update_billed_amount_in_delivery_note',
        'utm_medium_id',
        'utm_campaign_id',
        'utm_source_id',
        'company_contact_person_id',
        'last_scanned_warehouse',
        'item_wise_tax_details'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'posting_date' => 'date',
        'due_date' => 'date',
        'po_date' => 'date',
        'is_pos' => 'boolean',
        'is_return' => 'boolean',
        'update_stock' => 'boolean',
        'is_discounted' => 'boolean',
        'is_opening' => 'boolean', // ENUM Yes/No
        'grand_total' => 'decimal:2',
        'total' => 'decimal:2',
        'net_total' => 'decimal:2',
        'paid_amount' => 'decimal:2',
        'outstanding_amount' => 'decimal:2',
    ];

    // Accessors for IsOpening 'Yes'/'No'
    public function getIsOpeningAttribute($value)
    {
        return $value === 'Yes';
    }

    public function setIsOpeningAttribute($value)
    {
        $this->attributes['is_opening'] = $value ? 'Yes' : 'No';
    }

    public function isPaid()
    {
        return $this->outstanding_amount <= 0;
    }

    public function isOverdue()
    {
        return !$this->isPaid() && $this->due_date < now();
    }


    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function posProfile()
    {
        return $this->belongsTo(PosProfile::class);
    }

    public function itemsRelation()
    {
        return $this->hasMany(PosInvoiceItem::class, 'parent_id');
    }

    public function taxesRelation()
    {
        // Assuming SalesTaxesAndCharges attached to PosInvoice, schema usually reuses similar tables or generic ones, need to check if pos_invoice_taxes exists?
        // Wait, typical ERPNext structure reuses child tables or has specific ones.
        // I don't see `pos_invoice_taxes` in the list, but I see `pos_closing_entry_taxes`.
        // Usually `Sales Taxes and Charges` table is used with `parenttype`='Pos Invoice'.
        return $this->hasMany(SalesTaxesAndCharges::class, 'parent_id');
    }

    public function paymentsRelation()
    {
        // Similarly, `Sales Invoice Payment` table might be used or `Pos Invoice Payment`?
        // I don't see `pos_invoice_payment` table.
        // It likely uses `Sales Invoice Payment` with parenttype='Pos Invoice'.
        return $this->hasMany(SalesInvoicePayment::class, 'parent_id');
    }
}
