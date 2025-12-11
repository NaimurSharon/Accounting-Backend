<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PosProfileUser extends Model
{
    use HasFactory;

    protected $table = 'pos_profile_user';

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
        'default',
        'user_id'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'default' => 'boolean',
    ];

    public function posProfile()
    {
        return $this->belongsTo(PosProfile::class, 'parent_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
