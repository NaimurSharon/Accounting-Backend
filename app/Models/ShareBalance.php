<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShareBalance extends Model
{
    use HasFactory;

    protected $table = 'share_balance';

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
        'share_type_id',
        'from_no',
        'rate',
        'no_of_shares',
        'to_no',
        'amount',
        'is_company',
        'current_state' // ENUM
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'rate' => 'decimal:2',
        'amount' => 'decimal:2',
        'is_company' => 'boolean',
    ];

    public function shareholder()
    {
        return $this->belongsTo(Shareholder::class, 'parent_id');
    }
}
