<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JournalEntryTemplateAccount extends Model
{
    use HasFactory;

    protected $table = 'journal_entry_template_account';

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
        'account_id'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
    ];

    public function journalEntryTemplate()
    {
        return $this->belongsTo(JournalEntryTemplate::class, 'parent_id');
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
