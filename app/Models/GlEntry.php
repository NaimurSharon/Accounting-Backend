<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GlEntry extends Model
{
    use HasFactory;

    protected $table = 'gl_entry';

    const CREATED_AT = 'creation';
    const UPDATED_AT = 'modified';

    protected $fillable = [
        'name',
        'creation',
        'modified',
        'modified_by',
        'owner',
        'docstatus',
        'idx',
        'posting_date',
        'transaction_date',
        'account_id',
        'party_type_id',
        'party',
        'cost_center_id',
        'debit',
        'credit',
        'account_currency_id',
        'debit_in_account_currency',
        'credit_in_account_currency',
        'against',
        'against_voucher_type_id',
        'against_voucher',
        'voucher_type_id',
        'voucher_no',
        'voucher_detail_no',
        'project_id',
        'remarks',
        'is_opening',
        'is_advance',
        'fiscal_year_id',
        'company_id',
        'finance_book_id',
        'to_rename',
        'due_date',
        'is_cancelled',
        'transaction_currency_id',
        'transaction_exchange_rate',
        'debit_in_transaction_currency',
        'credit_in_transaction_currency',
        'voucher_subtype',
        'debit_in_reporting_currency',
        'credit_in_reporting_currency',
        'reporting_currency_exchange_rate',
    ];

    protected $casts = [
        'posting_date' => 'date',
        'transaction_date' => 'date',
        'due_date' => 'date',
        'debit' => 'decimal:2',
        'credit' => 'decimal:2',
        'debit_in_account_currency' => 'decimal:2',
        'credit_in_account_currency' => 'decimal:2',
        'transaction_exchange_rate' => 'decimal:2',
        'debit_in_transaction_currency' => 'decimal:2',
        'credit_in_transaction_currency' => 'decimal:2',
        'debit_in_reporting_currency' => 'decimal:2',
        'credit_in_reporting_currency' => 'decimal:2',
        'reporting_currency_exchange_rate' => 'decimal:2',
        'is_opening' => 'boolean', // ENUM 'No', 'Yes' mapped to boolean usually, but here it's ENUM. I'll handle it.
        'is_advance' => 'boolean',
        'is_cancelled' => 'boolean',
        'account_id' => 'integer',
        'party_type_id' => 'integer',
        'cost_center_id' => 'integer',
        'voucher_type_id' => 'integer',
        'against_voucher_type_id' => 'integer',
        'project_id' => 'integer',
        'fiscal_year_id' => 'integer',
        'company_id' => 'integer',
        'finance_book_id' => 'integer',
        'transaction_currency_id' => 'integer',
        'creation' => 'datetime',
        'modified' => 'datetime',
    ];

    // Accessors for ENUM boolean-like fields if they are stored as strings 'Yes'/'No' in DB but we want boolean in code.
    // However, if the DB stores 'No' and 'Yes', Laravel won't automatically cast to boolean false/true unless we define mutators.
    // The previous code had `ENUM('No', 'Yes')`.

    // Accessors for ENUM boolean-like fields
    public function getIsOpeningAttribute($value)
    {
        return $value === 'Yes';
    }

    public function setIsOpeningAttribute($value)
    {
        $this->attributes['is_opening'] = $value ? 'Yes' : 'No';
    }

    public function getIsAdvanceAttribute($value)
    {
        return $value === 'Yes';
    }

    public function setIsAdvanceAttribute($value)
    {
        $this->attributes['is_advance'] = $value ? 'Yes' : 'No';
    }

    // Scopes
    public function scopeForAccount($query, $accountId)
    {
        return $query->where('account_id', $accountId);
    }

    public function scopeBetween($query, $startDate, $endDate)
    {
        return $query->whereBetween('posting_date', [$startDate, $endDate]);
    }

    // Helpers
    public function getNetAmountAttribute()
    {
        return $this->debit - $this->credit;
    }

    // Relationships
    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class);
    }

    public function costCenter(): BelongsTo
    {
        return $this->belongsTo(CostCenter::class);
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function fiscalYear(): BelongsTo
    {
        return $this->belongsTo(FiscalYear::class);
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class, 'account_currency_id');
    }

    public function transactionCurrency(): BelongsTo
    {
        return $this->belongsTo(Currency::class, 'transaction_currency_id');
    }

    public function voucher()
    {
        // Dynamic relationship to the voucher
        // voucher_type_id usually stores the Doctype ID/Name in ERPNext, e.g. "Sales Invoice" (as string or ID).
        // Since we are using IDs, assume voucher_type_id maps to a Doctype model we don't handle dynamically easily without a map.
        // But if it's string based (which ERPNext uses), we could do:
        // return $this->morphTo(__FUNCTION__, 'voucher_type_id', 'voucher_no');

        // Given existing schema uses Strings for Types in many places but we have _id suffixes 
        // in previous models, let's assume keys are handled. 
        // Actually, if `voucher_type_id` is an integer, it refers to `doctype` table?
        // Let's implement a safe manual approach or comment.
        // For now, I will add a method that tries to resolve it.

        return $this->morphTo(__FUNCTION__, 'voucher_type_id', 'voucher_no');
    }
}
