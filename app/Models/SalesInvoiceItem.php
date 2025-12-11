<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesInvoiceItem extends Model
{
    use HasFactory;

    protected $table = 'sales_invoice_item';

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
        'image_view',
        'image',
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
        'expense_account_id',
        'item_tax_template_id',
        'cost_center_id',
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
        'item_group_id',
        'brand',
        'item_tax_rate',
        'actual_batch_qty',
        'actual_qty',
        'sales_order_id',
        'so_detail',
        'delivery_note_id',
        'dn_detail',
        'delivered_qty',
        'is_fixed_asset',
        'asset_id',
        'page_break',
        'finance_book_id',
        'project_id',
        'sales_invoice_item', // reference?
        'incoming_rate',
        'stock_uom_rate',
        'discount_account_id',
        'grant_commission',
        'purchase_order_id',
        'purchase_order_item',
        'has_item_scanned',
        'serial_and_batch_bundle_id',
        'use_serial_batch_fields',
        'distributed_discount_amount',
        'company_total_stock',
        'pos_invoice_item',
        'pos_invoice_id',
        'scio_detail'
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
        'is_free_item' => 'boolean',
        'delivered_by_supplier' => 'boolean',
        'enable_deferred_revenue' => 'boolean',
        'allow_zero_valuation_rate' => 'boolean',
        'grant_commission' => 'boolean',
        'has_item_scanned' => 'boolean',
    ];

    public function salesInvoice()
    {
        return $this->belongsTo(SalesInvoice::class, 'parent_id');
    }

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_code_id');
    }
}
