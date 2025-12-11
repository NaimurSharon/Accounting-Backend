<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseInvoiceAdvance extends Model
{
    use HasFactory;

    protected $table = 'purchase_invoice_advance';

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
        'remarks',
        'reference_row',
        'advance_amount',
        'allocated_amount',
        'exchange_gain_loss',
        'ref_exchange_rate',
        'difference_posting_date'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'difference_posting_date' => 'date',
        'advance_amount' => 'decimal:2',
        'allocated_amount' => 'decimal:2',
        'exchange_gain_loss' => 'decimal:2',
        'ref_exchange_rate' => 'decimal:2',
    ];

    public function purchaseInvoice()
    {
        return $this->belongsTo(PurchaseInvoice::class, 'parent_id');
    }
}
