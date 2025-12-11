<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialReportTemplate extends Model
{
    use HasFactory;

    protected $table = 'financial_report_template';

    protected $fillable = [
        'name',
        'creation',
        'modified',
        'modified_by',
        'owner',
        'docstatus',
        'idx',
        'template_name',
        'report_type',
        'module_id',
        'rows', // likely JSON or reference
        'disabled'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'disabled' => 'boolean',
    ];

    public function rowsRelation() // Renamed to avoid reserved word conflict if any
    {
        return $this->hasMany(FinancialReportRow::class, 'parent_id');
    }
}
