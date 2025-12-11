<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepostAccountingLedgerSettings extends Model
{
    use HasFactory;

    protected $table = 'repost_accounting_ledger_settings';

    protected $fillable = [
        'name',
        'creation',
        'modified',
        'modified_by',
        'owner',
        'docstatus',
        'idx',
        'allowed_types' // Child table
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
    ];

    public function allowedTypes()
    {
        return $this->hasMany(RepostAllowedTypes::class, 'parent_id');
    }
}
