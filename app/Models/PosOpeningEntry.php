<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PosOpeningEntry extends Model
{
    use HasFactory;

    protected $table = 'pos_opening_entry';

    protected $fillable = [
        'name',
        'creation',
        'modified',
        'modified_by',
        'owner',
        'docstatus',
        'idx',
        'period_start_date',
        'period_end_date',
        'posting_date',
        'company_id',
        'pos_profile_id',
        'user_id',
        'amended_from_id',
        'set_posting_date', // boolean?
        'status',
        'pos_closing_entry', // ID
        'balance_details' // JSON? Child table? Child table `pos_opening_entry_detail` exists.
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'period_start_date' => 'datetime',
        'period_end_date' => 'date',
        'posting_date' => 'date',
        'set_posting_date' => 'boolean',
    ];

    public function details()
    {
        return $this->hasMany(PosOpeningEntryDetail::class, 'parent_id');
    }
}
