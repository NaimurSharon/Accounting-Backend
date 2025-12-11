<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeggedCurrencies extends Model
{
    use HasFactory;

    protected $table = 'pegged_currencies';

    protected $fillable = [
        'name',
        'creation',
        'modified',
        'modified_by',
        'owner',
        'docstatus',
        'idx',
        'pegged_currency_item'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
    ];
}
