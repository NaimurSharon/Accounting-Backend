<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockEntry extends Model
{
    use HasFactory;

    protected $table = 'stock_entry';
    protected $guarded = [];

    protected $casts = [
        'docstatus' => 'integer',
        'is_opening' => 'string', // 'Yes'/'No' usually, but keep as string or cast like others
        'posting_date' => 'date',
        'creation' => 'datetime',
        'modified' => 'datetime',
    ];

    public function getIsOpeningAttribute($value)
    {
        return $value === 'Yes';
    }

    public function itemsRelation()
    {
        // Assuming StockEntryDetail exists
        return $this->hasMany(StockEntryDetail::class, 'parent_id');
    }

    public function fromWarehouse()
    {
        return $this->belongsTo(Warehouse::class, 'from_warehouse_id');
    }

    public function toWarehouse()
    {
        return $this->belongsTo(Warehouse::class, 'to_warehouse_id');
    }

    public function workOrder()
    {
        return $this->belongsTo(WorkOrder::class); // If exists
    }
}
