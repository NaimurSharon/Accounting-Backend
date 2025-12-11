<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PosInvoiceReference extends Model
{
    use HasFactory;

    protected $table = 'pos_invoice_reference';

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
        'pos_invoice_id',
        'customer_id',
        'posting_date',
        'grand_total',
        'is_return',
        'return_against_id'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'posting_date' => 'date',
        'grand_total' => 'decimal:2',
        'is_return' => 'boolean',
    ];
}
