<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcessStatementOfAccountsCc extends Model
{
    use HasFactory;

    protected $table = 'process_statement_of_accounts_cc';

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
        'cc_id'
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
