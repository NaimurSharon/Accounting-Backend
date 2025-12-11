<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BudgetAccount extends Model
{
    use HasFactory;

    protected $table = 'budget_account';

    const CREATED_AT = 'creation';
    const UPDATED_AT = 'modified';

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
        'account_id',
        'budget_amount',
    ];

    protected $casts = [
        'budget_amount' => 'decimal:2',
        'docstatus' => 'integer',
        'idx' => 'integer',
        'account_id' => 'integer',
        'parent_id' => 'integer',
        'creation' => 'datetime',
        'modified' => 'datetime',
    ];

    public function budget(): BelongsTo
    {
        return $this->belongsTo(Budget::class, 'parent_id');
    }

    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class);
    }
}
