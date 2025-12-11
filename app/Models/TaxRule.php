<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaxRule extends Model
{
    use HasFactory;

    protected $table = 'tax_rule';

    protected $fillable = [
        'name',
        'creation',
        'modified',
        'modified_by',
        'owner',
        'docstatus',
        'idx',
        'tax_type', // ENUM
        'use_for_shopping_cart',
        'sales_tax_template_id',
        'purchase_tax_template_id',
        'customer_id',
        'supplier_id',
        'item_id',
        'billing_city',
        'billing_county',
        'billing_state',
        'billing_zipcode',
        'billing_country_id',
        'tax_category_id',
        'customer_group_id',
        'supplier_group_id',
        'item_group_id',
        'shipping_city',
        'shipping_county',
        'shipping_state',
        'shipping_zipcode',
        'shipping_country_id',
        'from_date',
        'to_date',
        'priority',
        'company_id'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'from_date' => 'date',
        'to_date' => 'date',
        'use_for_shopping_cart' => 'boolean',
    ];
    // Scopes
    public function scopeValidDate($query, $date = null)
    {
        $date = $date ?: now();
        return $query->where(function ($q) use ($date) {
            $q->where('from_date', '<=', $date)
                ->orWhereNull('from_date');
        })->where(function ($q) use ($date) {
            $q->where('to_date', '>=', $date)
                ->orWhereNull('to_date');
        });
    }

    public function scopeForCustomer($query, $customerId)
    {
        return $query->where('customer_id', $customerId)->orWhereNull('customer_id');
    }

    public function scopeForSupplier($query, $supplierId)
    {
        return $query->where('supplier_id', $supplierId)->orWhereNull('supplier_id');
    }

    public function scopeForItem($query, $itemId)
    {
        return $query->where('item_id', $itemId)->orWhereNull('item_id');
    }

    // Relationships
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function salesTaxTemplate()
    {
        return $this->belongsTo(SalesTaxesAndChargesTemplate::class, 'sales_tax_template_id');
    }

    public function purchaseTaxTemplate()
    {
        return $this->belongsTo(PurchaseTaxesAndChargesTemplate::class, 'purchase_tax_template_id');
    }
}
