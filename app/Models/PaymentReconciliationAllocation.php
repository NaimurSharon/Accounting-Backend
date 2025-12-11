<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentReconciliationAllocation extends Model
{
    use HasFactory;

    protected $table = 'payment_reconciliation_allocation';

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
        'invoice_number',
        'allocated_amount',
        'difference_account_id',
        'difference_amount',
        'reference_name',
        'is_advance',
        'reference_type_id', // Doctype? No, it's int. Maybe Doctype ID.
        'invoice_type_id', // Doctype ID?
        'unreconciled_amount',
        'amount',
        'reference_row',
        'currency_id',
        'exchange_rate',
        'cost_center_id',
        'gain_loss_posting_date',
        'debit_or_credit_note_posting_date'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'allocated_amount' => 'decimal:2',
        'amount' => 'decimal:2',
        'difference_amount' => 'decimal:2',
    ];

    public function paymentReconciliation()
    {
        return $this->belongsTo(PaymentReconciliation::class, 'parent_id');
    }
}
