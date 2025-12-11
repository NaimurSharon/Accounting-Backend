<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesTaxesAndCharges extends Model
{
    use HasFactory;

    protected $table = 'sales_taxes_and_charges';

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
        'charge_type', // ENUM
        'row_id',
        'account_head_id', // Account
        'cost_center_id',
        'description',
        'included_in_print_rate',
        'rate',
        'tax_amount',
        'total',
        'tax_amount_after_discount_amount',
        'base_tax_amount',
        'base_total',
        'base_tax_amount_after_discount_amount',
        'project_id',
        'included_in_paid_amount',
        'dont_recompute_tax',
        'account_currency_id',
        'net_amount',
        'base_net_amount',
        'set_by_item_tax_template'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'included_in_print_rate' => 'boolean',
        'included_in_paid_amount' => 'boolean',
        'dont_recompute_tax' => 'boolean',
        'set_by_item_tax_template' => 'boolean',
        'rate' => 'decimal:2',
        'tax_amount' => 'decimal:2',
        'total' => 'decimal:2',
    ];

    public function salesInvoice()
    {
        return $this->belongsTo(SalesInvoice::class, 'parent_id');
    }
}
