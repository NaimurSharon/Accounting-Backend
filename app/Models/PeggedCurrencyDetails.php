<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeggedCurrencyDetails extends Model
{
    use HasFactory;

    protected $table = 'pegged_currency_details';

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
        'source_currency_id',
        'pegged_exchange_rate',
        'pegged_against_id'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
    ];

    public function sourceCurrency()
    {
        return $this->belongsTo(Currency::class, 'source_currency_id');
    }

    public function peggedAgainst()
    {
        return $this->belongsTo(Currency::class, 'pegged_against_id');
    }
}
