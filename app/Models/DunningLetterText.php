<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DunningLetterText extends Model
{
    use HasFactory;

    protected $table = 'dunning_letter_text';

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
        'language_id',
        'is_default_language',
        'body_text',
        'closing_text'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'is_default_language' => 'boolean',
    ];
}
