<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PricingRuleItemCode extends Model
{
    use HasFactory;

    protected $table = 'pricing_rule_item_code';

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
        'item_code_id',
        'uom_id'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
    ];

    public function pricingRule()
    {
        return $this->belongsTo(PricingRule::class, 'parent_id');
    }
}
