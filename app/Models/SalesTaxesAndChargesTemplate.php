<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesTaxesAndChargesTemplate extends Model
{
    use HasFactory;

    protected $table = 'sales_taxes_and_charges_template';

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
        'taxes', // Child
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
        return $this->hasMany(SalesTaxesAndCharges::class, 'parent_id');
    }
}
