<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DunningType extends Model
{
    use HasFactory;

    protected $table = 'dunning_type';

    protected $fillable = [
        'name',
        'creation',
        'modified',
        'modified_by',
        'owner',
        'docstatus',
        'idx',
        'dunning_type',
        'dunning_fee',
        'dunning_letter_text',
        'rate_of_interest',
        'is_default',
        'income_account_id',
        'cost_center_id',
        'company_id'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'dunning_fee' => 'decimal:2',
        'rate_of_interest' => 'decimal:2',
        'is_default' => 'boolean',
    ];

    public function incomeAccount()
    {
        return $this->belongsTo(Account::class, 'income_account_id');
    }

    public function costCenter()
    {
        return $this->belongsTo(CostCenter::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
