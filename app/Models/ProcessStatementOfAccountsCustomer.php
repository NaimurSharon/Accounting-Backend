<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcessStatementOfAccountsCustomer extends Model
{
    use HasFactory;

    protected $table = 'process_statement_of_accounts_customer';

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
        'customer_id',
        'primary_email',
        'billing_email',
        'customer_name'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
    ];

    public function processSoa()
    {
        return $this->belongsTo(ProcessStatementOfAccounts::class, 'parent_id');
    }
}
