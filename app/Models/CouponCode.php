<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CouponCode extends Model
{
    use HasFactory;

    protected $table = 'coupon_code';

    protected $fillable = [
        'name',
        'creation',
        'modified',
        'modified_by',
        'owner',
        'docstatus',
        'idx',
        'coupon_name',
        'coupon_type',
        'customer_id',
        'coupon_code',
        'pricing_rule_id',
        'valid_from',
        'valid_upto',
        'maximum_use',
        'used',
        'description',
        'amended_from_id',
        'from_external_ecomm_platform'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'valid_from' => 'date',
        'valid_upto' => 'date',
        'from_external_ecomm_platform' => 'boolean',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
