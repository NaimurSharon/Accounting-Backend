<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionPlan extends Model
{
    use HasFactory;

    protected $table = 'subscription_plan';

    protected $fillable = [
        'name',
        'creation',
        'modified',
        'modified_by',
        'owner',
        'docstatus',
        'idx',
        'plan_name',
        'currency_id',
        'item_id',
        'price_determination', // ENUM
        'cost',
        'price_list_id',
        'billing_interval', // ENUM
        'billing_interval_count',
        'payment_gateway_id',
        'cost_center_id',
        'product_price_id' // VARCHAR/Link
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'cost' => 'decimal:2',
    ];
}
