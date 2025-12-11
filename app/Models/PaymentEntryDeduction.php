<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentEntryDeduction extends Model
{
    use HasFactory;

    protected $table = 'payment_entry_deduction';

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
        'account_id',
        'cost_center_id',
        'amount',
        'description',
        'is_exchange_gain_loss'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'amount' => 'decimal:2',
        'is_exchange_gain_loss' => 'boolean',
    ];

    public function paymentEntry()
    {
        return $this->belongsTo(PaymentEntry::class, 'parent_id');
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
