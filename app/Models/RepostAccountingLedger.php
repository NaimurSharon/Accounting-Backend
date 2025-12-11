<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepostAccountingLedger extends Model
{
    use HasFactory;

    protected $table = 'repost_accounting_ledger';

    protected $fillable = [
        'name',
        'creation',
        'modified',
        'modified_by',
        'owner',
        'docstatus',
        'idx',
        'company_id',
        'amended_from_id',
        'vouchers', // Child table? Or MultiSelect? Schema says child table likely or text? Actually `repost_accounting_ledger_items` exists.
        'delete_cancelled_entries'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'delete_cancelled_entries' => 'boolean',
    ];

    public function items()
    {
        return $this->hasMany(RepostAccountingLedgerItems::class, 'parent_id');
    }
}
