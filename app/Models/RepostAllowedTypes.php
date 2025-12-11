<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepostAllowedTypes extends Model
{
    use HasFactory;

    protected $table = 'repost_allowed_types';

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
        'document_type_id',
        'allowed'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'allowed' => 'boolean',
    ];
}
