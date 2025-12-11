<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShareType extends Model
{
    use HasFactory;

    protected $table = 'share_type';

    protected $fillable = [
        'name',
        'creation',
        'modified',
        'modified_by',
        'owner',
        'docstatus',
        'idx',
        'title',
        'description'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
    ];
}
