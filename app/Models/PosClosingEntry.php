<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PosClosingEntry extends Model
{
    use HasFactory;

    protected $table = 'pos_closing_entry';

    protected $fillable = [
        'name',
        'creation',
        'modified',
        'modified_by',
        'owner',
        'docstatus',
        'idx',
        'period_start_date',
        'period_end_date',
        'posting_date',
        'company_id',
        'pos_profile_id',
        'user_id',
        'payment_reconciliation', // ID
        'grand_total',
        'net_total',
        'total_quantity',
        'taxes', // Sales Taxes?
        'amended_from_id',
        'pos_opening_entry_id',
        'status',
        'error_message',
        'posting_time',
        'pos_invoices', // Text/JSON?
        'sales_invoices', // Text/JSON?
        'total_taxes_and_charges'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'period_start_date' => 'datetime',
        'period_end_date' => 'datetime',
        'posting_date' => 'date',
        'grand_total' => 'decimal:2',
        'net_total' => 'decimal:2',
        'total_quantity' => 'decimal:2',
    ];

    public function details()
    {
        return $this->hasMany(PosClosingEntryDetail::class, 'parent_id');
    }

    public function taxesRelation()
    {
        return $this->hasMany(PosClosingEntryTaxes::class, 'parent_id');
    }
}
