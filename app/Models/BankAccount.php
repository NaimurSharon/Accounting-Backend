<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BankAccount extends Model
{
    use HasFactory;

    protected $table = 'bank_account';

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
        'account_id', // Linked to general ledger account
        'bank_id',
        'account_type_id', // subtype
        'account_subtype_id',
        'is_default',
        'is_company_account',
        'company_id',
        'party_type_id',
        'party',
        'iban',
        'bank_account_no',
        'integration_id',
        'last_integration_date',
        'mask',
        'branch_code',
        'disabled',
    ];

    protected $casts = [
        'is_default' => 'boolean',
        'is_company_account' => 'boolean',
        'disabled' => 'boolean',
        'last_integration_date' => 'date',
        'docstatus' => 'integer',
        'idx' => 'integer',
        'account_id' => 'integer',
        'bank_id' => 'integer',
        'company_id' => 'integer',
        'party_type_id' => 'integer',
        'creation' => 'datetime',
        'modified' => 'datetime',
    ];

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('disabled', 0);
    }

    public function scopeCompanyAccount($query)
    {
        return $query->where('is_company_account', 1);
    }

    // Relationships
    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class);
    }

    public function bank(): BelongsTo
    {
        return $this->belongsTo(Bank::class);
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
