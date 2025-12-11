<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AccountingPeriod extends Model
{
    use HasFactory;

    protected $table = 'accounting_period';

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
        'period_name',
        'start_date',
        'end_date',
        'company_id',
        'disabled',
        'closed_documents',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'disabled' => 'boolean',
        'docstatus' => 'integer',
        'idx' => 'integer',
        'company_id' => 'integer',
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
        return $query->where('start_date', '<=', $date)
            ->where('end_date', '>=', $date);
    }

    public function scopeCurrent($query)
    {
        return $this->scopeForDate($query, now());
    }

    // Helpers
    public static function hasOverlap($startDate, $endDate, $excludeId = null)
    {
        $query = self::where(function ($q) use ($startDate, $endDate) {
            $q->whereBetween('start_date', [$startDate, $endDate])
                ->orWhereBetween('end_date', [$startDate, $endDate])
                ->orWhere(function ($q2) use ($startDate, $endDate) {
                    $q2->where('start_date', '<=', $startDate)
                        ->where('end_date', '>=', $endDate);
                });
        });

        if ($excludeId) {
            $query->where('id', '!=', $excludeId);
        }

        return $query->exists();
    }

    // Relationships
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
