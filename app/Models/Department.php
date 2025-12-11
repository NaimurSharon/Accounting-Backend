<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $table = 'department';
    protected $guarded = [];

    protected $casts = [
        'disabled' => 'boolean',
        'is_group' => 'boolean',
        'creation' => 'datetime',
        'modified' => 'datetime',
    ];

    public function scopeActive($query)
    {
        return $query->where('disabled', 0);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
