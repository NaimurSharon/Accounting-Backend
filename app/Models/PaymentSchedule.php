<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentSchedule extends Model
{
    use HasFactory;

    protected $table = 'payment_schedule';

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
        'payment_term_id',
        'description',
        'due_date',
        'invoice_portion',
        'payment_amount',
        'mode_of_payment_id',
        'paid_amount',
        'discounted_amount',
        'outstanding',
        'discount_date',
        'discount_type',
        'discount',
        'base_payment_amount',
        'base_outstanding',
        'base_paid_amount',
        'due_date_based_on',
        'credit_days',
        'credit_months',
        'discount_validity_based_on',
        'discount_validity'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'due_date' => 'date',
        'discount_date' => 'date',
        'payment_amount' => 'decimal:2',
        'paid_amount' => 'decimal:2',
        'outstanding' => 'decimal:2',
    ];

    public function paymentTerm()
    {
        return $this->belongsTo(PaymentTerm::class);
    }
}
