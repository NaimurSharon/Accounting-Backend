<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemTaxTemplate extends Model
{
    use HasFactory;

    protected $table = 'item_tax_template';

    protected $fillable = [
        'name',
        'creation',
        'modified',
        'modified_by',
        'owner',
        'docstatus',
        'idx',
        'title',
        'taxes', // JSON? No, probably child table `item_tax_template_detail`
        'company_id',
        'disabled'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'disabled' => 'boolean',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function details()
    {
        return $this->hasMany(ItemTaxTemplateDetail::class, 'parent_id');
    }
}
