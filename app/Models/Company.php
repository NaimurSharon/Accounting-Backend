<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use HasFactory;

    protected $table = 'company';

    const CREATED_AT = 'creation';
    const UPDATED_AT = 'modified';

    protected $guarded = []; // Allow all fields for now since schema is not fully known

    // Relationships
    public function accounts(): HasMany
    {
        return $this->hasMany(Account::class);
    }

    public function costCenters(): HasMany
    {
        return $this->hasMany(CostCenter::class);
    }

    public function glEntries(): HasMany
    {
        return $this->hasMany(GlEntry::class);
    }
}
