<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentEntryReference extends Model
{
    use HasFactory;

    protected $table = 'payment_entry_reference';

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
        'reference_doctype_id',
        'reference_name',
        'due_date',
        'bill_no',
        'total_amount',
        'outstanding_amount',
        'allocated_amount',
        'exchange_rate',
        'payment_term_id',
        'exchange_gain_loss',
        'account_id',
        'account_type',
        'payment_type',
        'payment_request_id',
        'payment_term_outstanding',
        'payment_request_outstanding',
        'reconcile_effect_on',
        'advance_voucher_type_id',
        'advance_voucher_no'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'due_date' => 'date',
        'reconcile_effect_on' => 'date',
        'total_amount' => 'decimal:2',
        'outstanding_amount' => 'decimal:2',
        'allocated_amount' => 'decimal:2',
        'exchange_rate' => 'decimal:2',
        'exchange_gain_loss' => 'decimal:2',
        'payment_term_outstanding' => 'decimal:2',
        'payment_request_outstanding' => 'decimal:2',
    ];

    public function paymentEntry()
    {
        return $this->belongsTo(PaymentEntry::class, 'parent_id');
    }
}
