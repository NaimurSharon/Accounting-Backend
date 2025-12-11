<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JournalEntryAccount extends Model
{
    use HasFactory;

    protected $table = 'journal_entry_account';

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
        'account_id',
        'account_type',
        'cost_center_id',
        'party_type_id',
        'party',
        'account_currency_id',
        'exchange_rate',
        'debit_in_account_currency',
        'debit',
        'credit_in_account_currency',
        'credit',
        'reference_type',
        'reference_name',
        'reference_due_date',
        'project_id',
        'is_advance',
        'user_remark',
        'against_account',
        'bank_account_id',
        'reference_detail_no',
        'advance_voucher_type_id',
        'advance_voucher_no',
        'is_tax_withholding_account'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'reference_due_date' => 'date',
        'exchange_rate' => 'decimal:2',
        'debit_in_account_currency' => 'decimal:2',
        'debit' => 'decimal:2',
        'credit_in_account_currency' => 'decimal:2',
        'credit' => 'decimal:2',
        'is_advance' => 'boolean', // ENUM 'Yes'/'No'
        'is_tax_withholding_account' => 'boolean',
    ];

    public function getIsAdvanceAttribute($value)
    {
        return $value === 'Yes';
    }

    public function setIsAdvanceAttribute($value)
    {
        $this->attributes['is_advance'] = $value ? 'Yes' : 'No';
    }

    public function journalEntry()
    {
        return $this->belongsTo(JournalEntry::class, 'parent_id');
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function costCenter()
    {
        return $this->belongsTo(CostCenter::class);
    }

    public function accountCurrency()
    {
        return $this->belongsTo(Currency::class, 'account_currency_id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function bankAccount()
    {
        return $this->belongsTo(BankAccount::class);
    }

    // Party relationship is complex due to polymorphic nature (party_type_id is likely an ID to a DocType table we don't have, or just an ID).
    // Avoiding direct relationship method for 'party' for now.
}
