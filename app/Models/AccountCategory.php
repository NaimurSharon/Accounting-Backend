<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AccountCategory extends Model
{
    use HasFactory;

    protected $table = 'account_category';

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
        'account_category_name',
        'description',
    ];

    protected $casts = [
        'docstatus' => 'integer',
        'idx' => 'integer',
        'creation' => 'datetime',
        'modified' => 'datetime',
    ];

    // Relationships
    public function accounts(): HasMany
    {
        return $this->hasMany(Account::class);
    }
}
