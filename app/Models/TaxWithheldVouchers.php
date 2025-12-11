<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaxWithheldVouchers extends Model
{
    use HasFactory;

    protected $table = 'tax_withheld_vouchers';

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
        'voucher_type', // VARCHAR likely
        'voucher_name',
        'taxable_amount'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'taxable_amount' => 'decimal:2',
    ];

    public function parentModel()
    {
        return $this->morphTo(null, 'parenttype', 'parent_id');
    }
}
