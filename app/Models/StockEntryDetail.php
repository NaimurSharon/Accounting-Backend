<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockEntryDetail extends Model
{
    use HasFactory;

    protected $table = 'stock_entry_detail';
    protected $guarded = [];

    protected $casts = [
        'qty' => 'decimal:2',
        'transfer_qty' => 'decimal:2',
        'basic_rate' => 'decimal:2',
        'basic_amount' => 'decimal:2',
        'creation' => 'datetime',
        'modified' => 'datetime',
    ];

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_code', 'name'); // Assuming item_code references name or id? Usually item_code in ERPNext.
    }

    public function stockEntry()
    {
        return $this->belongsTo(StockEntry::class, 'parent_id');
    }

    public function sWarehouse()
    {
        return $this->belongsTo(Warehouse::class, 's_warehouse', 'name');
    }

    public function tWarehouse()
    {
        return $this->belongsTo(Warehouse::class, 't_warehouse', 'name');
    }

    public function costCenter()
    {
        return $this->belongsTo(CostCenter::class);
    }
}
