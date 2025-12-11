<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankClearanceDetail extends Model
{
    use HasFactory;

    protected $table = 'bank_clearance_detail';

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
        'payment_document_id', // Likely reference to PaymentEntry or JournalEntry
        'payment_entry',
        'against_account',
        'amount',
        'posting_date',
        'cheque_number',
        'cheque_date',
        'clearance_date'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'posting_date' => 'date',
        'cheque_date' => 'date',
        'clearance_date' => 'date',
        // amount can be varchar in sql as per view, but logically decimal. keeping as string or casting to decimal if sure. SQL view said varchar(255). Safe to not cast or cast to string.
    ];

    public function bankClearance()
    {
        return $this->belongsTo(BankClearance::class, 'parent_id');
    }
}
