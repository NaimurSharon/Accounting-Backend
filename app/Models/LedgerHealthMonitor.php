<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LedgerHealthMonitor extends Model
{
    use HasFactory;

    protected $table = 'ledger_health_monitor';
    protected $guarded = [];
}
