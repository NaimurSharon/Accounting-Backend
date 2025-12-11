<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesInvoiceReference extends Model
{
    use HasFactory;

    protected $table = 'sales_invoice_reference';

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
        'sales_invoice_id',
        'posting_date',
        'customer_id',
        'is_return',
        'return_against_id',
        'grand_total'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'posting_date' => 'date',
        'grand_total' => 'decimal:2',
        'is_return' => 'boolean',
    ];
}
