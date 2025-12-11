<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PosInvoiceItem extends Model
{
    use HasFactory;

    protected $table = 'pos_invoice_item';

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
        'barcode',
        'item_code_id',
        'item_name',
        'customer_item_code',
        'description',
        'item_group_id',
        'brand',
        'image',
        'image_view',
        'qty',
        'stock_uom_id',
        'uom_id',
        'conversion_factor',
        'stock_qty',
        'price_list_rate',
        'base_price_list_rate',
        'margin_type',
        'margin_rate_or_amount',
        'rate_with_margin',
        'discount_percentage',
        'discount_amount',
        'base_rate_with_margin',
        'rate',
        'amount',
        'item_tax_template_id',
        'base_rate',
        'base_amount',
        'pricing_rules',
        'is_free_item',
        'net_rate',
        'net_amount',
        'base_net_rate',
        'base_net_amount',
        'delivered_by_supplier',
        'income_account_id',
        'is_fixed_asset',
        'asset_id',
        'finance_book_id',
        'expense_account_id',
        'deferred_revenue_account_id',
        'service_stop_date',
        'enable_deferred_revenue',
        'service_start_date',
        'service_end_date',
        'weight_per_unit',
        'total_weight',
        'weight_uom_id',
        'warehouse_id',
        'target_warehouse_id',
        'quality_inspection_id',
        'batch_no_id',
        'allow_zero_valuation_rate',
        'serial_no',
        'item_tax_rate',
        'actual_batch_qty',
        'actual_qty',
        'sales_order_id',
        'so_detail',
        'delivery_note_id',
        'dn_detail',
        'delivered_qty',
        'cost_center_id',
        'page_break',
        'project_id',
        'pos_invoice_item', // Reference to self? or original item?
        'grant_commission',
        'has_item_scanned',
        'serial_and_batch_bundle_id',
        'use_serial_batch_fields',
        'distributed_discount_amount'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'service_stop_date' => 'date',
        'service_start_date' => 'date',
        'service_end_date' => 'date',
        'qty' => 'decimal:2',
        'rate' => 'decimal:2',
        'amount' => 'decimal:2',
    ];

    public function posInvoice()
    {
        return $this->belongsTo(PosInvoice::class, 'parent_id');
    }

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_code_id');
    }
}
