<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnreconcilePaymentEntries extends Model
{
    use HasFactory;

    protected $table = 'unreconcile_payment_entries';

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
        'reference_name',
        'allocated_amount',
        'unlinked',
        'reference_doctype_id',
        'account',
        'party_type',
        'party',
        'account_currency_id'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'allocated_amount' => 'decimal:2',
        'unlinked' => 'boolean',
    ];

    public function unreconcilePayment()
    {
        return $this->belongsTo(UnreconcilePayment::class, 'parent_id');
    }
}
