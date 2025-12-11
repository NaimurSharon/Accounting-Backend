<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcessPeriodClosingVoucherDetail extends Model
{
    use HasFactory;

    protected $table = 'process_period_closing_voucher_detail';

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
        'processing_date',
        'status', // ENUM
        'closing_balance',
        'report_type' // ENUM
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'processing_date' => 'date',
    ];

    public function processPcv()
    {
        return $this->belongsTo(ProcessPeriodClosingVoucher::class, 'parent_id');
    }
}
