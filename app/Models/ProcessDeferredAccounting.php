<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcessDeferredAccounting extends Model
{
    use HasFactory;

    protected $table = 'process_deferred_accounting';

    protected $fillable = [
        'name',
        'creation',
        'modified',
        'modified_by',
        'owner',
        'docstatus',
        'idx',
        'type', // ENUM
        'amended_from_id',
        'start_date',
        'end_date',
        'posting_date',
        'account_id',
        'company_id'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'start_date' => 'date',
        'end_date' => 'date',
        'posting_date' => 'date',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
