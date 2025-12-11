<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory;

    protected $table = 'purchase_order';

    protected $fillable = [
        'name',
        'supplier_id',
        'company_id',
        'transaction_date',
        'schedule_date',
        'status',
        'billing_status',
        'receipt_status',
        'grand_total',
        'total_qty',
        'currency_id',
        'conversion_rate',
        'set_warehouse_id',
        'project_id',
        'supplier_address_id',
        'shipping_address_id',
        'terms',
        'per_billed',
        'per_received',
        'amended_from_id',
        'advance_paid'
    ];

    protected $casts = [
        'transaction_date' => 'date',
        'schedule_date' => 'date',
        'grand_total' => 'decimal:2',
        'total_qty' => 'decimal:2',
        'per_billed' => 'decimal:2',
        'per_received' => 'decimal:2',
        'advance_paid' => 'decimal:2',
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function itemsRelation()
    {
        return $this->hasMany(PurchaseOrderItem::class, 'parent_id'); // Assuming PurchaseOrderItem
    }

    public function invoices()
    {
        return $this->hasMany(PurchaseInvoice::class, 'purchase_order_id');
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('docstatus', 1);
    }

    public function scopeToBill($query)
    {
        return $query->where('per_billed', '<', 100)->where('docstatus', 1);
    }
}
