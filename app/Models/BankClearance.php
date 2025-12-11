<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankClearance extends Model
{
    use HasFactory;

    protected $table = 'bank_clearance';

    protected $fillable = [
        'name',
        'creation',
        'modified',
        'modified_by',
        'owner',
        'docstatus',
        'idx',
        'account_id',
        'account_currency_id',
        'from_date',
        'to_date',
        'bank_account_id',
        'include_reconciled_entries',
        'include_pos_transactions',
        'payment_entries'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'from_date' => 'date',
        'to_date' => 'date',
        'include_reconciled_entries' => 'boolean',
        'include_pos_transactions' => 'boolean',
    ];

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function bankAccount()
    {
        return $this->belongsTo(BankAccount::class);
    }

    public function details()
    {
        return $this->hasMany(BankClearanceDetail::class, 'parent_id');
    }
}
