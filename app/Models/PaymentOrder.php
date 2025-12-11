<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentOrder extends Model
{
    use HasFactory;

    protected $table = 'payment_order';

    protected $fillable = [
        'name',
        'creation',
        'modified',
        'modified_by',
        'owner',
        'docstatus',
        'idx',
        'naming_series',
        'company_id',
        'party_id',
        'posting_date',
        'references',
        'amended_from_id',
        'payment_order_type',
        'company_bank_account_id',
        'company_bank_id',
        'account'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'posting_date' => 'date',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function companyBankAccount()
    {
        return $this->belongsTo(BankAccount::class, 'company_bank_account_id');
    }

    public function companyBank()
    {
        return $this->belongsTo(Bank::class, 'company_bank_id');
    }

    public function referencesRelation()
    {
        return $this->hasMany(PaymentOrderReference::class, 'parent_id');
    }
}
