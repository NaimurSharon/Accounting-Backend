<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentTerm extends Model
{
    use HasFactory;

    protected $table = 'payment_term';

    protected $fillable = [
        'name',
        'creation',
        'modified',
        'modified_by',
        'owner',
        'docstatus',
        'idx',
        'payment_term_name',
        'invoice_portion',
        'mode_of_payment_id',
        'due_date_based_on',
        'credit_days',
        'credit_months',
        'description',
        'discount_type',
        'discount',
        'discount_validity_based_on',
        'discount_validity'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'invoice_portion' => 'decimal:2',
        'discount' => 'decimal:2',
    ];

    public function modeOfPayment()
    {
        return $this->belongsTo(ModeOfPayment::class);
    }
}
