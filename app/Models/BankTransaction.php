<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankTransaction extends Model
{
    use HasFactory;

    protected $table = 'bank_transaction';

    protected $fillable = [
        'name',
        'creation',
        'modified',
        'modified_by',
        'owner',
        'docstatus',
        'idx',
        'naming_series',
        'date',
        'status',
        'bank_account_id',
        'company_id',
        'currency_id',
        'description',
        'reference_number',
        'transaction_id',
        'payment_entries',
        'allocated_amount',
        'amended_from_id',
        'unallocated_amount',
        'party_type_id',
        'party',
        'deposit',
        'withdrawal',
        'transaction_type',
        'bank_party_name',
        'bank_party_iban',
        'bank_party_account_number'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'date' => 'date',
        'allocated_amount' => 'decimal:2',
        'unallocated_amount' => 'decimal:2',
        'deposit' => 'decimal:2',
        'withdrawal' => 'decimal:2',
    ];

    public function bankAccount()
    {
        return $this->belongsTo(BankAccount::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function payments()
    {
        return $this->hasMany(BankTransactionPayments::class, 'parent_id');
    }
}
