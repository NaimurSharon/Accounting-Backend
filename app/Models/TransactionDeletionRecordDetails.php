<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDeletionRecordDetails extends Model
{
    use HasFactory;

    protected $table = 'transaction_deletion_record_details';

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
        'doctype_name_id', // Link to DocType
        'docfield_name',
        'no_of_docs',
        'done'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'done' => 'boolean',
    ];
}
