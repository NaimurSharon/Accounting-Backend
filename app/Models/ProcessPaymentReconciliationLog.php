<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcessPaymentReconciliationLog extends Model
{
    use HasFactory;

    protected $table = 'process_payment_reconciliation_log';

    protected $fillable = [
        'name',
        'creation',
        'modified',
        'modified_by',
        'owner',
        'docstatus',
        'idx',
        'allocations', // JSON/Child table
        'reconciled',
        'total_allocations',
        'allocated',
        'reconciled_entries',
        'error_log',
        'process_pr_id',
        'status' // ENUM
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'reconciled' => 'boolean',
    ];

    public function processPr()
    {
        return $this->belongsTo(ProcessPaymentReconciliation::class, 'process_pr_id');
    }
}
