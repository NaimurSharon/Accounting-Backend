<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkOrder extends Model
{
    use HasFactory;

    protected $table = 'work_order';
    protected $guarded = [];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'qty' => 'decimal:2',
        'produced_qty' => 'decimal:2',
        'expected_delivery_date' => 'date',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class, 'production_item'); // 'production_item' is typical column name
    }
}
