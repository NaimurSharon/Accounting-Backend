<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesInvoiceAdvance extends Model
{
    use HasFactory;

    protected $table = 'sales_invoice_advance';

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
    ];

    public function salesInvoice()
    {
        return $this->belongsTo(SalesInvoice::class, 'parent_id');
    }
}
