<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Budget extends Model
{
    use HasFactory;

    protected $table = 'budget';

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
        'budget_against', // 'Cost Center' or 'Project'
        'company_id',
        'cost_center_id',
        'project_id',
        'amended_from_id',
        'applicable_on_material_request',
        'action_if_annual_budget_exceeded_on_mr',
        'action_if_accumulated_monthly_budget_exceeded_on_mr',
        'applicable_on_purchase_order',
        'action_if_annual_budget_exceeded_on_po',
        'action_if_accumulated_monthly_budget_exceeded_on_po',
        'applicable_on_booking_actual_expenses',
        'action_if_annual_budget_exceeded',
        'action_if_accumulated_monthly_budget_exceeded',
        'naming_series',
        'applicable_on_cumulative_expense',
        'action_if_annual_exceeded_on_cumulative_expense',
        'action_if_accumulated_monthly_exceeded_on_cumulative_expense',
        'budget_distribution',
        'account_id',
        'budget_amount',
        'revision_of',
        'distribute_equally',
        'from_fiscal_year_id',
        'to_fiscal_year_id',
        'budget_start_date',
        'budget_end_date',
        'distribution_frequency',
        'budget_distribution_total',
    ];

    protected $casts = [
        'budget_amount' => 'decimal:2',
        'budget_distribution_total' => 'decimal:2',
        'applicable_on_material_request' => 'boolean',
        'applicable_on_purchase_order' => 'boolean',
        'applicable_on_booking_actual_expenses' => 'boolean',
        'applicable_on_cumulative_expense' => 'boolean',
        'distribute_equally' => 'boolean',
        'budget_start_date' => 'date',
        'budget_end_date' => 'date',
        'docstatus' => 'integer',
        'idx' => 'integer',
        'company_id' => 'integer',
        'cost_center_id' => 'integer',
        'project_id' => 'integer',
        'creation' => 'datetime',
        'modified' => 'datetime',
    ];

    // Relationships
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function costCenter(): BelongsTo
    {
        return $this->belongsTo(CostCenter::class);
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class); // Assuming Project model exists or will exist
    }

    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class);
    }

    public function budgetAccounts(): HasMany
    {
        return $this->hasMany(BudgetAccount::class, 'parent_id');
    }

    public function fromFiscalYear(): BelongsTo
    {
        return $this->belongsTo(FiscalYear::class, 'from_fiscal_year_id');
    }

    public function toFiscalYear(): BelongsTo
    {
        return $this->belongsTo(FiscalYear::class, 'to_fiscal_year_id');
    }
}
