<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentOrderReference extends Model
{
    use HasFactory;

    protected $table = 'payment_order_reference';

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
        'amount',
        'supplier_id',
        'payment_request_id',
        'mode_of_payment_id',
        'bank_account_id',
        'account_id',
        'payment_reference'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'amount' => 'decimal:2',
    ];

    public function paymentOrder()
    {
        return $this->belongsTo(PaymentOrder::class, 'parent_id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
