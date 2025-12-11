<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepostPaymentLedger extends Model
{
    use HasFactory;

    protected $table = 'repost_payment_ledger';

    protected $fillable = [
        'name',
        'creation',
        'modified',
        'modified_by',
        'owner',
        'docstatus',
        'idx',
        'posting_date',
        'voucher_type_id',
        'amended_from_id',
        'company_id',
        'repost_vouchers', // Child table?
        'repost_status', // ENUM
        'add_manually',
        'repost_error_log'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'posting_date' => 'date',
        'add_manually' => 'boolean',
    ];

    public function items()
    {
        return $this->hasMany(RepostPaymentLedgerItems::class, 'parent_id');
    }
}
