<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcessPeriodClosingVoucher extends Model
{
    use HasFactory;

    protected $table = 'process_period_closing_voucher';

    protected $fillable = [
        'name',
        'creation',
        'modified',
        'modified_by',
        'owner',
        'docstatus',
        'idx',
        'parent_pcv_id',
        'status', // ENUM
        'amended_from_id',
        'p_l_closing_balance',
        'normal_balances',
        'z_opening_balances',
        'bs_closing_balance'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
    ];

    public function details()
    {
        return $this->hasMany(ProcessPeriodClosingVoucherDetail::class, 'parent_id');
    }
}
