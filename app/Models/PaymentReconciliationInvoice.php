<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentReconciliationInvoice extends Model
{
    use HasFactory;

    protected $table = 'payment_reconciliation_invoice';

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
        'invoice_type',
        'invoice_number',
        'invoice_date',
        'amount',
        'outstanding_amount',
        'currency_id',
        'exchange_rate'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'invoice_date' => 'date',
        'amount' => 'decimal:2',
        'outstanding_amount' => 'decimal:2',
    ];

    public function paymentReconciliation()
    {
        return $this->belongsTo(PaymentReconciliation::class, 'parent_id');
    }
}
