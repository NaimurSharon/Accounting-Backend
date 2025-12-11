<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = 'item'; // Assuming table name is 'item' based on 'item_code_id' typically mapping to Item model
    protected $guarded = [];

    protected $casts = [
        'disabled' => 'boolean',
        'is_stock_item' => 'boolean',
        'is_sales_item' => 'boolean',
        'is_purchase_item' => 'boolean',
        'valuation_rate' => 'decimal:2',
        'standard_rate' => 'decimal:2',
        'creation' => 'datetime',
        'modified' => 'datetime',
    ];

    public function scopeActive($query)
    {
        return $query->where('disabled', 0);
    }

    public function scopeStockItem($query)
    {
        return $query->where('is_stock_item', 1);
    }

    public function scopeSalesItem($query)
    {
        return $query->where('is_sales_item', 1);
    }

    public function scopePurchaseItem($query)
    {
        return $query->where('is_purchase_item', 1);
    }
}
