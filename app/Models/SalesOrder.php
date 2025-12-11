<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesOrder extends Model
{
    use HasFactory;

    protected $table = 'sales_order';

    protected $fillable = [
        'name',
        'customer_id',
        'company_id',
        'transaction_date',
        'delivery_date',
        'status',
        'billing_status',
        'delivery_status',
        'grand_total',
        'total_qty',
        'currency_id',
        'conversion_rate',
        'po_no',
        'po_date',
        'project_id',
        'sales_partner_id',
        'commission_rate',
        'total_commission',
        'customer_address_id',
        'shipping_address_name_id',
        'terms',
        'per_billed',
        'per_delivered',
        'amended_from_id',
        'advance_paid'
    ];

    protected $casts = [
        'transaction_date' => 'date',
        'delivery_date' => 'date',
        'grand_total' => 'decimal:2',
        'total_qty' => 'decimal:2',
        'per_billed' => 'decimal:2',
        'per_delivered' => 'decimal:2',
        'advance_paid' => 'decimal:2',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function itemsRelation()
    {
        return $this->hasMany(SalesOrderItem::class, 'parent_id'); // Assuming SalesOrderItem
    }

    public function invoices()
    {
        return $this->hasMany(SalesInvoice::class, 'sales_order_id'); // If SalesInvoice links back
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('docstatus', 1); // 1 = Submitted
    }

    public function scopeToBill($query)
    {
        return $query->where('per_billed', '<', 100)->where('docstatus', 1);
    }
}
