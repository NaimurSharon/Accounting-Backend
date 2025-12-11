<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentLedgerEntry extends Model
{
    use HasFactory;

    protected $table = 'payment_ledger_entry';

    protected $fillable = [
        'name',
        'creation',
        'modified',
        'modified_by',
        'owner',
        'docstatus',
        'idx',
        'posting_date',
        'account_type',
        'account_id',
        'party_type_id',
        'party',
        'voucher_type_id',
        'voucher_no',
        'against_voucher_type_id',
        'against_voucher_no',
        'amount',
        'account_currency_id',
        'amount_in_account_currency',
        'delinked',
        'company_id',
        'cost_center_id',
        'due_date',
        'finance_book_id',
        'remarks',
        'voucher_detail_no'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'posting_date' => 'date',
        'due_date' => 'date',
        'amount' => 'decimal:2',
        'amount_in_account_currency' => 'decimal:2',
        'delinked' => 'boolean',
    ];

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function costCenter()
    {
        return $this->belongsTo(CostCenter::class);
    }
}
