<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JournalEntryTemplate extends Model
{
    use HasFactory;

    protected $table = 'journal_entry_template';

    protected $fillable = [
        'name',
        'creation',
        'modified',
        'modified_by',
        'owner',
        'docstatus',
        'idx',
        'voucher_type',
        'company_id',
        'is_opening',
        'accounts',
        'naming_series',
        'template_title',
        'multi_currency'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'is_opening' => 'boolean', // ENUM 'Yes'/'No'
        'multi_currency' => 'boolean',
    ];

    public function getIsOpeningAttribute($value)
    {
        return $value === 'Yes';
    }

    public function setIsOpeningAttribute($value)
    {
        $this->attributes['is_opening'] = $value ? 'Yes' : 'No';
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function accountsRelation()
    {
        return $this->hasMany(JournalEntryTemplateAccount::class, 'parent_id');
    }
}
