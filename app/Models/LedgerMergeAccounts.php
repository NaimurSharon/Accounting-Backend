<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LedgerMergeAccounts extends Model
{
    use HasFactory;

    protected $table = 'ledger_merge_accounts';
    protected $guarded = [];
}
