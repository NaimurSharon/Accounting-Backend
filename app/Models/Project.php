<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = 'project';

    const CREATED_AT = 'creation';
    const UPDATED_AT = 'modified';

    protected $guarded = [];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'expected_end_date' => 'date',
        'expected_start_date' => 'date',
        'actual_start_date' => 'date',
        'actual_end_date' => 'date',
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 'Open'); // Assuming 'Open' is the active status
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class); // If exists
    }
}
