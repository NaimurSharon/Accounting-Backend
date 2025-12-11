<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CostCenter extends Model
{
    use HasFactory;

    protected $table = 'cost_center';

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
        'cost_center_name',
        'cost_center_number',
        'parent_cost_center_id',
        'company_id',
        'is_group',
        'lft',
        'rgt',
        'old_parent_id',
        'disabled',
    ];

    protected $casts = [
        'is_group' => 'boolean',
        'disabled' => 'boolean',
        'docstatus' => 'integer',
        'idx' => 'integer',
        'parent_cost_center_id' => 'integer',
        'company_id' => 'integer',
        'old_parent_id' => 'integer',
        'creation' => 'datetime',
        'modified' => 'datetime',
    ];

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('disabled', 0);
    }

    public function scopeGroup($query)
    {
        return $query->where('is_group', 1);
    }

    public function scopeLedger($query)
    {
        return $query->where('is_group', 0);
    }

    public function scopeRoot($query)
    {
        return $query->whereNull('parent_cost_center_id');
    }

    public function getIsRootAttribute(): bool
    {
        return is_null($this->parent_cost_center_id);
    }

    // Relationships
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function parentCostCenter(): BelongsTo
    {
        return $this->belongsTo(CostCenter::class, 'parent_cost_center_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(CostCenter::class, 'parent_cost_center_id');
    }

    public function budgets(): HasMany
    {
        return $this->hasMany(Budget::class);
    }
}
