<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingRuleCondition extends Model
{
    use HasFactory;

    protected $table = 'shipping_rule_condition';

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
        'from_value',
        'to_value',
        'shipping_amount'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'from_value' => 'decimal:2',
        'to_value' => 'decimal:2',
        'shipping_amount' => 'decimal:2',
    ];

    public function shippingRule()
    {
        return $this->belongsTo(ShippingRule::class, 'parent_id');
    }
}
