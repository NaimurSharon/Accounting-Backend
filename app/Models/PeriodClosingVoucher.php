<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeriodClosingVoucher extends Model
{
    use HasFactory;

    protected $table = 'period_closing_voucher';

    protected $fillable = [
        'name',
        'creation',
        'modified',
        'modified_by',
        'owner',
        'docstatus',
        'idx',
        'transaction_date',
        'fiscal_year_id',
        'amended_from_id',
        'company_id',
        'closing_account_head_id', // Account
        'remarks',
        'gle_processing_status',
        'error_message',
        'period_end_date',
        'period_start_date'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'transaction_date' => 'date',
        'period_start_date' => 'date',
        'period_end_date' => 'date',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function closingAccount()
    {
        return $this->belongsTo(Account::class, 'closing_account_head_id');
    }
}
