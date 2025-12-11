<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentEntry extends Model
{
    use HasFactory;

    protected $table = 'payment_entry';

    protected $fillable = [
        'name',
        'creation',
        'modified',
        'modified_by',
        'owner',
        'docstatus',
        'idx',
        'naming_series',
        'payment_type', // ENUM
        'posting_date',
        'company_id',
        'cost_center_id',
        'mode_of_payment_id',
        'party_type_id',
        'party',
        'party_name',
        'contact_person_id',
        'contact_email',
        'paid_from_id',
        'paid_from_account_currency_id',
        'paid_to_id',
        'paid_to_account_currency_id',
        'paid_amount',
        'source_exchange_rate',
        'base_paid_amount',
        'received_amount',
        'target_exchange_rate',
        'base_received_amount',
        'references',
        'total_allocated_amount',
        'base_total_allocated_amount',
        'unallocated_amount',
        'difference_amount',
        'deductions',
        'reference_no',
        'reference_date',
        'clearance_date',
        'project_id',
        'remarks',
        'letter_head_id',
        'print_heading_id',
        'bank',
        'bank_account_no',
        'payment_order_id',
        'auto_repeat_id',
        'amended_from_id',
        'title',
        'bank_account_id',
        'party_bank_account_id',
        'payment_order_status', // ENUM
        'status', // ENUM
        'custom_remarks',
        'tax_withholding_category_id',
        'apply_tax_withholding_amount',
        'purchase_taxes_and_charges_template_id',
        'sales_taxes_and_charges_template_id',
        'taxes',
        'base_total_taxes_and_charges',
        'total_taxes_and_charges',
        'paid_amount_after_tax',
        'base_paid_amount_after_tax',
        'received_amount_after_tax',
        'base_received_amount_after_tax',
        'paid_from_account_type',
        'paid_to_account_type',
        'book_advance_payments_in_separate_party_account',
        'base_in_words',
        'in_words',
        'reconcile_on_advance_payment_date',
        'is_opening' // ENUM
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'posting_date' => 'date',
        'reference_date' => 'date',
        'clearance_date' => 'date',
        'paid_amount' => 'decimal:2',
        'source_exchange_rate' => 'decimal:2',
        'base_paid_amount' => 'decimal:2',
        'received_amount' => 'decimal:2',
        'target_exchange_rate' => 'decimal:2',
        'base_received_amount' => 'decimal:2',
        'total_allocated_amount' => 'decimal:2',
        'base_total_allocated_amount' => 'decimal:2',
        'unallocated_amount' => 'decimal:2',
        'difference_amount' => 'decimal:2',
        'base_total_taxes_and_charges' => 'decimal:2',
        'total_taxes_and_charges' => 'decimal:2',
        'paid_amount_after_tax' => 'decimal:2',
        'base_paid_amount_after_tax' => 'decimal:2',
        'received_amount_after_tax' => 'decimal:2',
        'base_received_amount_after_tax' => 'decimal:2',
        'custom_remarks' => 'boolean',
        'apply_tax_withholding_amount' => 'boolean',
        'book_advance_payments_in_separate_party_account' => 'boolean',
        'reconcile_on_advance_payment_date' => 'boolean',
        'is_opening' => 'boolean', // ENUM
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
    public function isIncoming()
    {
        return $this->payment_type === 'Receive';
    }

    public function isOutgoing()
    {
        return $this->payment_type === 'Pay';
    }

    public function isInternal()
    {
        return $this->payment_type === 'Internal Transfer';
    }

    // Relationships
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function costCenter()
    {
        return $this->belongsTo(CostCenter::class);
    }

    public function modeOfPayment()
    {
        return $this->belongsTo(ModeOfPayment::class);
    }

    public function paidFrom()
    {
        return $this->belongsTo(Account::class, 'paid_from_id');
    }

    public function paidTo()
    {
        return $this->belongsTo(Account::class, 'paid_to_id');
    }

    /**
     * Dynamic relationship to the party (Customer, Supplier, etc.)
     */
    public function partyRelation()
    {
        // Assuming party_type is the Class Name, e.g. "Customer", "Supplier"
        // In ERPNext "party_type" is a string "Customer". We need to map to App\Models\Customer.

        $model = 'App\\Models\\' . $this->party_type;
        // Note: In real app, might need a map if names differ. 
        // But for now assuming direct mapping.

        if (class_exists($model)) {
            return $this->belongsTo($model, 'party', 'name');
            // 'party' field stores the name/ID of the party.
            // If models use 'id' as PK and 'party' stores ID, likely 'id'. 
            // Schema: `party` VARCHAR(255). Likely storing Name if ERPNext, or ID if modified. 
            // In THIS schema, many foreign keys are `_id` (INT). 
            // But `party` is VARCHAR. Let's assume it references `name` or string ID.
            // However, other tables have `customer_id` INT.
            // This `payment_entry` table has `party` VARCHAR. 
            // It might be a poltymorphic relation on name, or simply a string reference.
            // I'll leave it as belongsTo with constraints if possible, but without strict FK column it's hard.
            // Let's return a morphTo-like manually or just generic accessor.
        }

        return null;
    }

    public function referencesRelation()
    {
        return $this->hasMany(PaymentEntryReference::class, 'parent_id');
    }

    public function deductionsRelation()
    {
        return $this->hasMany(PaymentEntryDeduction::class, 'parent_id');
    }
}
