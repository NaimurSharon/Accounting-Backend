<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesInvoicePayment extends Model
{
    use HasFactory;

    protected $table = 'sales_invoice_payment';

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
        'mode_of_payment_id',
        'amount',
        'account_id',
        'type',
        'base_amount',
        'clearance_date',
        'default',
        'reference_no'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'clearance_date' => 'date',
        'amount' => 'decimal:2',
        'base_amount' => 'decimal:2',
        'default' => 'boolean',
    ];

    public function salesInvoice()
    {
        return $this->belongsTo(SalesInvoice::class, 'parent_id');
    }
}
