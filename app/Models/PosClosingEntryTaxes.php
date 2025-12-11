<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PosClosingEntryTaxes extends Model
{
    use HasFactory;

    protected $table = 'pos_closing_entry_taxes';

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
        'amount',
        'account_head_id'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'amount' => 'decimal:2',
    ];

    public function posClosingEntry()
    {
        return $this->belongsTo(PosClosingEntry::class, 'parent_id');
    }
}
