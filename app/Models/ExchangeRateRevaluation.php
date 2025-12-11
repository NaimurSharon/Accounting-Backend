<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExchangeRateRevaluation extends Model
{
    use HasFactory;

    protected $table = 'exchange_rate_revaluation';
    protected $guarded = [];
}
