<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoyaltyProgramCollection extends Model
{
    use HasFactory;

    protected $table = 'loyalty_program_collection';

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
        'tier_name',
        'min_spent',
        'collection_factor'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'min_spent' => 'decimal:2',
        'collection_factor' => 'decimal:2',
    ];

    public function loyaltyProgram()
    {
        return $this->belongsTo(LoyaltyProgram::class, 'parent_id');
    }
}
