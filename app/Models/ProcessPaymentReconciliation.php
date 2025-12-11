<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcessPaymentReconciliation extends Model
{
    use HasFactory;

    protected $table = 'process_payment_reconciliation';

    protected $fillable = [
        'name',
        'creation',
        'modified',
        'modified_by',
        'owner',
        'docstatus',
        'idx',
        'status', // ENUM
        'company_id',
        'party_type_id',
        'party',
        'receivable_payable_account_id',
        'from_invoice_date',
        'to_invoice_date',
        'from_payment_date',
        'to_payment_date',
        'cost_center_id',
        'bank_cash_account_id',
        'error_log',
        'amended_from_id',
        'default_advance_account_id'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'from_invoice_date' => 'date',
        'to_invoice_date' => 'date',
        'from_payment_date' => 'date',
        'to_payment_date' => 'date',
    ];
}
