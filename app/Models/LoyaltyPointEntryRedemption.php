<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoyaltyPointEntryRedemption extends Model
{
    use HasFactory;

    protected $table = 'loyalty_point_entry_redemption';

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
        'sales_invoice',
        'redemption_date',
        'redeemed_points'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'redemption_date' => 'date',
    ];

    public function loyaltyPointEntry()
    {
        return $this->belongsTo(LoyaltyPointEntry::class, 'parent_id'); // If this is child of LoyaltyPointEntry? Yes, parent_id refers to it usually.
    }
}
