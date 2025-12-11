<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PosInvoiceMergeLog extends Model
{
    use HasFactory;

    protected $table = 'pos_invoice_merge_log';

    protected $fillable = [
        'name',
        'creation',
        'modified',
        'modified_by',
        'owner',
        'docstatus',
        'idx',
        'posting_date',
        'customer_id',
        'pos_invoices',
        'amended_from_id',
        'consolidated_invoice_id',
        'consolidated_credit_note_id',
        'pos_closing_entry_id',
        'merge_invoices_based_on',
        'customer_group_id',
        'posting_time',
        'company_id'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'posting_date' => 'date',
    ];
}
