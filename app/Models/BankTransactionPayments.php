<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankTransactionPayments extends Model
{
    use HasFactory;

    protected $table = 'bank_transaction_payments';

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
        'payment_document_id',
        'payment_entry',
        'allocated_amount',
        'clearance_date'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'clearance_date' => 'date',
        'allocated_amount' => 'decimal:2',
    ];

    public function bankTransaction()
    {
        return $this->belongsTo(BankTransaction::class, 'parent_id');
    }
}
