<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseTaxesAndCharges extends Model
{
    use HasFactory;

    protected $table = 'purchase_taxes_and_charges';

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
        'category', // ENUM
        'add_deduct_tax', // ENUM
        'charge_type', // ENUM
        'row_id',
        'included_in_print_rate',
        'account_head_id',
        'cost_center_id',
        'description',
        'rate',
        'tax_amount',
        'tax_amount_after_discount_amount',
        'total',
        'base_tax_amount',
        'base_total',
        'base_tax_amount_after_discount_amount',
        'project_id',
        'included_in_paid_amount',
        'account_currency_id',
        'is_tax_withholding_account',
        'net_amount',
        'base_net_amount',
        'set_by_item_tax_template'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'included_in_print_rate' => 'boolean',
        'included_in_paid_amount' => 'boolean',
        'is_tax_withholding_account' => 'boolean',
        'set_by_item_tax_template' => 'boolean',
        'rate' => 'decimal:2',
        'tax_amount' => 'decimal:2',
        'total' => 'decimal:2',
    ];

    public function purchaseInvoice()
    {
        return $this->belongsTo(PurchaseInvoice::class, 'parent_id');
    }
}
