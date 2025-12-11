<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashierClosingPayments extends Model
{
    use HasFactory;

    protected $table = 'cashier_closing_payments';

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
        'mode_of_payment_id',
        'amount'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'amount' => 'decimal:2',
    ];

    public function cashierClosing()
    {
        return $this->belongsTo(CashierClosing::class, 'parent_id');
    }

    public function modeOfPayment()
    {
        return $this->belongsTo(ModeOfPayment::class);
    }
}
