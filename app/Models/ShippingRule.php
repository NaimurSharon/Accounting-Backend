<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingRule extends Model
{
    use HasFactory;

    protected $table = 'shipping_rule';

    protected $fillable = [
        'name',
        'creation',
        'modified',
        'modified_by',
        'owner',
        'docstatus',
        'idx',
        'label',
        'disabled',
        'shipping_rule_type', // ENUM
        'company_id',
        'account_id',
        'cost_center_id',
        'calculate_based_on', // ENUM
        'shipping_amount',
        'conditions', // Child
        'countries', // Child
        'project_id'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'disabled' => 'boolean',
        'shipping_amount' => 'decimal:2',
    ];

    public function conditionsRelation()
    {
        return $this->hasMany(ShippingRuleCondition::class, 'parent_id');
    }

    public function countriesRelation()
    {
        return $this->hasMany(ShippingRuleCountry::class, 'parent_id');
    }
}
