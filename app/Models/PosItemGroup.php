<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PosItemGroup extends Model
{
    use HasFactory;

    protected $table = 'pos_item_group';

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
        'item_group_id'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
    ];

    public function posProfile()
    {
        return $this->belongsTo(PosProfile::class, 'parent_id');
    }
}
