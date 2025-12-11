<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoyaltyPointEntry extends Model
{
    use HasFactory;

    protected $table = 'loyalty_point_entry';

    protected $fillable = [
        'name',
        'creation',
        'modified',
        'modified_by',
        'owner',
        'docstatus',
        'idx',
        'loyalty_program_id',
        'loyalty_program_tier',
        'customer_id',
        'redeem_against_id',
        'loyalty_points',
        'purchase_amount',
        'expiry_date',
        'posting_date',
        'company_id',
        'invoice_type_id', // Doctype ID?
        'invoice',
        'discretionary_reason'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'expiry_date' => 'date',
        'posting_date' => 'date',
        'purchase_amount' => 'decimal:2',
    ];

    public function loyaltyProgram()
    {
        return $this->belongsTo(LoyaltyProgram::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
