<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDiscounting extends Model
{
    use HasFactory;

    protected $table = 'invoice_discounting';

    protected $fillable = [
        'name',
        'creation',
        'modified',
        'modified_by',
        'owner',
        'docstatus',
        'idx',
        'posting_date',
        'loan_start_date',
        'loan_period',
        'loan_end_date',
        'status',
        'company_id',
        'invoices',
        'total_amount',
        'bank_charges',
        'short_term_loan_id',
        'bank_account_id',
        'bank_charges_account_id',
        'accounts_receivable_credit_id',
        'accounts_receivable_discounted_id',
        'accounts_receivable_unpaid_id',
        'amended_from_id'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'posting_date' => 'date',
        'loan_start_date' => 'date',
        'loan_end_date' => 'date',
        'total_amount' => 'decimal:2',
        'bank_charges' => 'decimal:2',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function bankAccount()
    {
        return $this->belongsTo(BankAccount::class);
    }
}
