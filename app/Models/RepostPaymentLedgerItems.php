<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepostPaymentLedgerItems extends Model
{
    use HasFactory;

    protected $table = 'repost_payment_ledger_items';

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
        'voucher_type_id',
        'voucher_no'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
    ];

    public function repostPaymentLedger()
    {
        return $this->belongsTo(RepostPaymentLedger::class, 'parent_id');
    }
}
