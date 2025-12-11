<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentTermsTemplateDetail extends Model
{
    use HasFactory;

    protected $table = 'payment_terms_template_detail';

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
        'invoice_portion',
        'due_date_based_on',
        'credit_days',
        'credit_months',
        'mode_of_payment_id',
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

    public function paymentTermsTemplate()
    {
        return $this->belongsTo(PaymentTermsTemplate::class, 'parent_id');
    }

    public function paymentTerm()
    {
        return $this->belongsTo(PaymentTerm::class);
    }
}
