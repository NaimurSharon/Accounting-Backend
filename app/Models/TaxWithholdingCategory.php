<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaxWithholdingCategory extends Model
{
    use HasFactory;

    protected $table = 'tax_withholding_category';

    protected $fillable = [
        'name',
        'creation',
        'modified',
        'modified_by',
        'owner',
        'docstatus',
        'idx',
        'category_name',
        'rates', // Child table
        'accounts', // Child table
        'consider_party_ledger_amount',
        'tax_on_excess_amount',
        'round_off_tax_amount'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'consider_party_ledger_amount' => 'boolean',
        'tax_on_excess_amount' => 'boolean',
        'round_off_tax_amount' => 'boolean',
    ];

    public function ratesRelation()
    {
        return $this->hasMany(TaxWithholdingRate::class, 'parent_id');
    }

    public function accountsRelation()
    {
        return $this->hasMany(TaxWithholdingAccount::class, 'parent_id');
    }
}
