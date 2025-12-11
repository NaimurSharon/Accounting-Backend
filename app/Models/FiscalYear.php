<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FiscalYear extends Model
{
    use HasFactory;

    protected $table = 'fiscal_year';

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
        'year',
        'disabled',
        'year_start_date',
        'year_end_date',
        'companies', // Might be legacy or summary field
        'auto_created',
        'is_short_year',
    ];

    protected $casts = [
        'year_start_date' => 'date',
        'year_end_date' => 'date',
        'disabled' => 'boolean',
        'auto_created' => 'boolean',
        'is_short_year' => 'boolean',
        'docstatus' => 'integer',
        'idx' => 'integer',
        'creation' => 'datetime',
        'modified' => 'datetime',
    ];

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('disabled', 0);
    }

    public function scopeForDate($query, $date)
    {
        return $query->where('year_start_date', '<=', $date)
            ->where('year_end_date', '>=', $date);
    }

    public function scopeCurrent($query)
    {
        return $this->scopeForDate($query, now());
    }

    // Relationships
    public function companies(): HasMany
    {
        return $this->hasMany(FiscalYearCompany::class, 'parent_id');
    }
}
