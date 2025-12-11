<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SouthAfricaVatAccount extends Model
{
    use HasFactory;

    protected $table = 'south_africa_vat_account';

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
        'account_id'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
    ];
}
