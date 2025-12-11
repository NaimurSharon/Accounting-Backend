<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepostAccountingLedgerItems extends Model
{
    use HasFactory;

    protected $table = 'repost_accounting_ledger_items';

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
        'voucher_type_id', // Link to DocType
        'voucher_no'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
    ];

    public function repostLedger()
    {
        return $this->belongsTo(RepostAccountingLedger::class, 'parent_id');
    }
}
