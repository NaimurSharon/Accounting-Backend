<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PosClosingEntryDetail extends Model
{
    use HasFactory;

    protected $table = 'pos_closing_entry_detail';

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
        'mode_of_payment_id',
        'expected_amount',
        'difference',
        'opening_amount',
        'closing_amount'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'expected_amount' => 'decimal:2',
        'opening_amount' => 'decimal:2',
        'closing_amount' => 'decimal:2',
    ];

    public function posClosingEntry()
    {
        return $this->belongsTo(PosClosingEntry::class, 'parent_id');
    }
}
