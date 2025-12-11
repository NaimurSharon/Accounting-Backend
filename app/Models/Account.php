<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Account extends Model
{
    use HasFactory;

    protected $table = 'account';

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
        'account_name',
        'account_number',
        'is_group',
        'company_id',
        'root_type',
        'report_type',
        'account_currency_id',
        'parent_account_id',
        'account_type',
        'tax_rate',
        'freeze_account',
        'balance_must_be',
        'lft',
        'rgt',
        'old_parent',
        'include_in_gross',
        'disabled',
        'account_category_id',
    ];

    protected $casts = [
        'is_group' => 'boolean',
        'disabled' => 'boolean',
        'include_in_gross' => 'boolean',
        'docstatus' => 'integer',
        'idx' => 'integer',
        'tax_rate' => 'decimal:2',
        'company_id' => 'integer',
        'parent_account_id' => 'integer',
        'account_currency_id' => 'integer',
        'account_category_id' => 'integer',
        'creation' => 'datetime',
        'modified' => 'datetime',
    ];

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('disabled', 0);
    }

    public function scopeGroup($query)
    {
        return $query->where('is_group', 1);
    }

    public function scopeLedger($query)
    {
        return $query->where('is_group', 0);
    }

    public function scopeRoot($query)
    {
        return $query->whereNull('parent_account_id');
    }

    public function scopeByType($query, $type)
    {
        return $query->where('account_type', $type);
    }

    // Accessors & Helpers
    public function getIsRootAttribute(): bool
    {
        return is_null($this->parent_account_id);
    }

    public function isDebitAccount(): bool
    {
        // Typically Assets and Expenses are debit accounts
        // Valid report_types: 'Balance Sheet', 'Profit and Loss'
        // Root types usually indicate this: 'Asset', 'Liability', 'Equity', 'Income', 'Expense'
        return in_array($this->root_type, ['Asset', 'Expense']);
    }

    public function isCreditAccount(): bool
    {
        return in_array($this->root_type, ['Liability', 'Equity', 'Income']);
    }

    public function getBalance($startDate = null, $endDate = null)
    {
        $query = $this->glEntries();

        if ($startDate) {
            $query->where('posting_date', '>=', $startDate);
        }

        if ($endDate) {
            $query->where('posting_date', '<=', $endDate);
        }

        $debit = $query->sum('debit');
        $credit = $query->sum('credit');

        if ($this->isDebitAccount()) {
            return $debit - $credit;
        }

        return $credit - $debit;
    }

    // Relationships
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function parentAccount(): BelongsTo
    {
        return $this->belongsTo(Account::class, 'parent_account_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Account::class, 'parent_account_id');
    }

    public function accountCurrency(): BelongsTo
    {
        return $this->belongsTo(Currency::class, 'account_currency_id');
    }

    public function accountCategory(): BelongsTo
    {
        return $this->belongsTo(AccountCategory::class);
    }

    public function glEntries(): HasMany
    {
        return $this->hasMany(GlEntry::class);
    }
}
