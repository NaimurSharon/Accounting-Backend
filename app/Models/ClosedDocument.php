<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClosedDocument extends Model
{
    use HasFactory;

    protected $table = 'closed_document';

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
        'document_type_id', // Doctype ID
        'closed'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'closed' => 'boolean',
    ];
}
