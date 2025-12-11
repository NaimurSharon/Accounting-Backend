<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseTaxesAndChargesTemplate extends Model
{
    use HasFactory;

    protected $table = 'purchase_taxes_and_charges_template';

    protected $fillable = [
        'name',
        'creation',
        'modified',
        'modified_by',
        'owner',
        'docstatus',
        'idx',
        'title',
        'is_default',
        'disabled',
        'company_id',
        'taxes', // Child table (Purchase Taxes and Charges with parenttype='Purchase Taxes and Charges Template'?) -> Schema doesn't show separate child table, might reuse `purchase_taxes_and_charges` or generic `taxes` table?
        // Actually, schema shows `taxes` VARCHAR(255) in `purchase_taxes_and_charges_template`. It might be JSON or child table reference?
        // Wait, typical structure uses `purchase_taxes_and_charges` for children of `Purchase Invoice` AND `Purchase Taxes and Charges Template`.
        'tax_category_id'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'is_default' => 'boolean',
        'disabled' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('disabled', 0);
    }

    public function scopeDefault($query)
    {
        return $query->where('is_default', 1);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function taxesRelation()
    {
        // Typically children
        return $this->hasMany(PurchaseTaxesAndCharges::class, 'parent_id');
    }
}
