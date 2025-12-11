<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TerritoryItem extends Model
{
    use HasFactory;

    protected $table = 'territory_item'; // Not standard DocType? Schema says `territory_item`. Is it child of Territory? Or something else?
    // Likely child of something, schema has parent fields.

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
        'territory_id'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
    ];
}
