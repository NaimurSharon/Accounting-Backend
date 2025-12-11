<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemWiseTaxDetail extends Model
{
    use HasFactory;

    protected $table = 'item_wise_tax_detail';

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
        'item_row',
        'tax_row',
        'rate',
        'amount',
        'taxable_amount'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'rate' => 'decimal:2',
        'amount' => 'decimal:2',
        'taxable_amount' => 'decimal:2',
    ];
}
