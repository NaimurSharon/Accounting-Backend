<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModeOfPaymentAccount extends Model
{
    use HasFactory;

    protected $table = 'mode_of_payment_account';

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
        'company_id',
        'default_account_id'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
    ];

    public function modeOfPayment()
    {
        return $this->belongsTo(ModeOfPayment::class, 'parent_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function defaultAccount()
    {
        return $this->belongsTo(Account::class, 'default_account_id');
    }
}
