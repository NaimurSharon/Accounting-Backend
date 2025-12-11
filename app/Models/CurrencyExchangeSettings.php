<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrencyExchangeSettings extends Model
{
    use HasFactory;

    protected $table = 'currency_exchange_settings';
    protected $guarded = [];
}
