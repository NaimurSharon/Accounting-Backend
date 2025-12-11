<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseInvoiceItem extends Model
{
    use HasFactory;

    protected $table = 'purchase_invoice_item';

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
        'item_code_id',
        'item_name',
        'description',
        'image',
        'image_view',
        'received_qty',
        'qty',
        'rejected_qty',
        'stock_uom_id',
        'uom_id',
        'conversion_factor',
        'stock_qty',
        'price_list_rate',
        'discount_percentage',
        'discount_amount',
        'base_price_list_rate',
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
        'weight_per_unit',
        'total_weight',
        'weight_uom_id',
        'warehouse_id',
        'rejected_warehouse_id',
        'quality_inspection_id',
        'batch_no_id',
        'serial_no',
        'rejected_serial_no',
        'expense_account_id',
        'item_tax_template_id',
        'project_id',
        'cost_center_id',
        'deferred_expense_account_id',
        'service_stop_date',
        'enable_deferred_expense',
        'service_start_date',
        'service_end_date',
        'allow_zero_valuation_rate',
        'brand_id',
        'item_group_id',
        'item_tax_rate',
        'item_tax_amount',
        'purchase_order_id',
        'bom_id',
        'include_exploded_items',
        'is_fixed_asset',
        'asset_location_id',
        'po_detail',
        'purchase_receipt_id',
        'page_break',
        'pr_detail',
        'valuation_rate',
        'rm_supp_cost',
        'landed_cost_voucher_amount',
        'manufacturer_id',
        'manufacturer_part_no',
        'asset_category_id',
        'from_warehouse_id',
        'purchase_invoice_item', // reference?
        'stock_uom_rate',
        'sales_invoice_item',
        'margin_type',
        'margin_rate_or_amount',
        'rate_with_margin',
        'base_rate_with_margin',
        'product_bundle_id',
        'apply_tds',
        'serial_and_batch_bundle_id',
        'rejected_serial_and_batch_bundle_id',
        'wip_composite_asset_id',
        'use_serial_batch_fields',
        'material_request_id',
        'material_request_item',
        'sales_incoming_rate',
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
        'stock_qty' => 'decimal:2',
        'conversion_factor' => 'decimal:2',
        'is_free_item' => 'boolean',
        'enable_deferred_expense' => 'boolean',
        'allow_zero_valuation_rate' => 'boolean',
        'include_exploded_items' => 'boolean',
        'is_fixed_asset' => 'boolean',
        'apply_tds' => 'boolean',
    ];

    public function purchaseInvoice()
    {
        return $this->belongsTo(PurchaseInvoice::class, 'parent_id');
    }

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_code_id');
    }
}
