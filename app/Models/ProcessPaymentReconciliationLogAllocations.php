<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcessPaymentReconciliationLogAllocations extends Model
{
    use HasFactory;

    protected $table = 'process_payment_reconciliation_log_allocations';

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
        'reference_type_id',
        'reference_name',
        'reference_row',
        'invoice_type_id',
        'invoice_number',
        'allocated_amount',
        'unreconciled_amount',
        'amount',
        'is_advance',
        'difference_amount',
        'difference_account_id',
        'exchange_rate',
        'currency_id',
        'reconciled',
        'gain_loss_posting_date'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'allocated_amount' => 'decimal:2',
        'unreconciled_amount' => 'decimal:2',
        'amount' => 'decimal:2',
        'difference_amount' => 'decimal:2',
        'exchange_rate' => 'decimal:2',
        'reconciled' => 'boolean',
        'gain_loss_posting_date' => 'date',
    ];

    public function log()
    {
        return $this->belongsTo(ProcessPaymentReconciliationLog::class, 'parent_id');
    }
}
