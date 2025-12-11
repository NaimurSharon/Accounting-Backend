<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentReconciliation extends Model
{
    use HasFactory;

    protected $table = 'payment_reconciliation';
    protected $guarded = [];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'from_payment_date' => 'date',
        'to_payment_date' => 'date',
        'from_invoice_date' => 'date',
        'to_invoice_date' => 'date',
    ];

    public function payments()
    {
        return $this->hasMany(PaymentReconciliationPayment::class, 'parent_id');
    }

    public function invoices()
    {
        return $this->hasMany(PaymentReconciliationInvoice::class, 'parent_id');
    }

    public function allocations()
    {
        return $this->hasMany(PaymentReconciliationAllocation::class, 'parent_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
