<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bank extends Model
{
    use HasFactory;

    protected $table = 'bank';

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
        'bank_name',
        'swift_number',
        'website',
        'bank_transaction_mapping',
        'plaid_access_token',
    ];

    protected $casts = [
        'docstatus' => 'integer',
        'idx' => 'integer',
        'creation' => 'datetime',
        'modified' => 'datetime',
    ];

    // Relationships
    public function bankAccounts(): HasMany
    {
        return $this->hasMany(BankAccount::class);
    }
}
