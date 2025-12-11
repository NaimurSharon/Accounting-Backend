<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BudgetDistribution extends Model
{
    use HasFactory;

    protected $table = 'budget_distribution';

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
        'start_date',
        'end_date',
        'amount',
        'percent'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'start_date' => 'date',
        'end_date' => 'date',
        'amount' => 'decimal:2',
        'percent' => 'decimal:2',
    ];
}
