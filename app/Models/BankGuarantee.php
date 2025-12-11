<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankGuarantee extends Model
{
    use HasFactory;

    protected $table = 'bank_guarantee';

    protected $fillable = [
        'name',
        'creation',
        'modified',
        'modified_by',
        'owner',
        'docstatus',
        'idx',
        'bg_type',
        'reference_doctype_id',
        'reference_docname',
        'customer_id',
        'supplier_id',
        'project_id',
        'amount',
        'start_date',
        'validity',
        'end_date',
        'bank_id',
        'bank_account_id',
        'account_id',
        'bank_account_no',
        'iban',
        'branch_code',
        'swift_number',
        'more_information',
        'bank_guarantee_number',
        'name_of_beneficiary',
        'margin_money',
        'charges',
        'fixed_deposit_number',
        'amended_from_id'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'start_date' => 'date',
        'end_date' => 'date',
        'amount' => 'decimal:2',
        'margin_money' => 'decimal:2',
        'charges' => 'decimal:2',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }

    public function bankAccount()
    {
        return $this->belongsTo(BankAccount::class);
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
