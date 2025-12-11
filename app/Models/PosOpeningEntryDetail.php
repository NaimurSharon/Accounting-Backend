<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PosOpeningEntryDetail extends Model
{
    use HasFactory;

    protected $table = 'pos_opening_entry_detail';

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
        'opening_amount'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'opening_amount' => 'decimal:2',
    ];

    public function posOpeningEntry()
    {
        return $this->belongsTo(PosOpeningEntry::class, 'parent_id');
    }
}
