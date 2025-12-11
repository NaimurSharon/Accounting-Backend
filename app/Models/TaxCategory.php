<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaxCategory extends Model
{
    use HasFactory;

    protected $table = 'tax_category';

    protected $fillable = [
        'name',
        'creation',
        'modified',
        'modified_by',
        'owner',
        'docstatus',
        'idx',
        'title',
        'disabled'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'disabled' => 'boolean',
    ];
}
