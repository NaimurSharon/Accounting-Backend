<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialReportRow extends Model
{
    use HasFactory;

    protected $table = 'financial_report_row';

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
        'reference_code',
        'display_name',
        'indentation_level',
        'data_source',
        'balance_type',
        'bold_text',
        'italic_text',
        'hidden_calculation',
        'hide_when_empty',
        'reverse_sign',
        'calculation_formula',
        'include_in_charts',
        'color',
        'fieldtype',
        'advanced_filtering'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'bold_text' => 'boolean',
        'italic_text' => 'boolean',
        'hidden_calculation' => 'boolean',
        'hide_when_empty' => 'boolean',
        'reverse_sign' => 'boolean',
        'include_in_charts' => 'boolean',
        'advanced_filtering' => 'boolean',
    ];

    public function financialReportTemplate()
    {
        return $this->belongsTo(FinancialReportTemplate::class, 'parent_id');
    }
}
