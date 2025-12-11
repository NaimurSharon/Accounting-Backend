<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemTaxTemplateDetail extends Model
{
    use HasFactory;

    protected $table = 'item_tax_template_detail';

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
        'tax_type_id', // Account?
        'tax_rate'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'tax_rate' => 'decimal:2',
    ];

    public function itemTaxTemplate()
    {
        return $this->belongsTo(ItemTaxTemplate::class, 'parent_id');
    }

    public function taxType()
    {
        return $this->belongsTo(Account::class, 'tax_type_id'); // Assuming tax_type links to Account
    }
}
