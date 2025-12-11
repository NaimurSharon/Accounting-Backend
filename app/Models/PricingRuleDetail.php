<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PricingRuleDetail extends Model
{
    use HasFactory;

    protected $table = 'pricing_rule_detail';

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
        'pricing_rule_id',
        'item_code',
        'margin_type',
        'rate_or_discount',
        'child_docname',
        'rule_applied'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'rule_applied' => 'boolean',
    ];
}
