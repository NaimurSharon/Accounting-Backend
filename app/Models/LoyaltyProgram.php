<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoyaltyProgram extends Model
{
    use HasFactory;

    protected $table = 'loyalty_program';

    protected $fillable = [
        'name',
        'creation',
        'modified',
        'modified_by',
        'owner',
        'docstatus',
        'idx',
        'loyalty_program_name',
        'loyalty_program_type',
        'from_date',
        'to_date',
        'customer_group_id',
        'customer_territory_id',
        'auto_opt_in',
        'collection_rules',
        'conversion_factor',
        'expiry_duration',
        'expense_account_id',
        'cost_center_id',
        'company_id',
        'project_id'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'from_date' => 'date',
        'to_date' => 'date',
        'conversion_factor' => 'decimal:2',
        'auto_opt_in' => 'boolean',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function collectionRules() // Renamed to avoid confusion, but table is loyalty_program_collection (child)
    {
        return $this->hasMany(LoyaltyProgramCollection::class, 'parent_id');
    }
}
