<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentReconciliationPayment extends Model
{
    use HasFactory;

    protected $table = 'payment_reconciliation_payment';

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
        'posting_date',
        'is_advance',
        'reference_row',
        'amount',
        'currency_id',
        'difference_amount',
        'exchange_rate',
        'cost_center_id',
        'remarks'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'posting_date' => 'date',
        'amount' => 'decimal:2',
        'difference_amount' => 'decimal:2',
    ];

    public function paymentReconciliation()
    {
        return $this->belongsTo(PaymentReconciliation::class, 'parent_id');
    }
}
