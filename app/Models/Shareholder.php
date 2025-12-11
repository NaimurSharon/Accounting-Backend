<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shareholder extends Model
{
    use HasFactory;

    protected $table = 'shareholder';

    protected $fillable = [
        'name',
        'creation',
        'modified',
        'modified_by',
        'owner',
        'docstatus',
        'idx',
        'title',
        'naming_series',
        'folio_no',
        'company_id',
        'is_company',
        'share_balance', // Child?
        'contact_list'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'is_company' => 'boolean',
    ];

    public function shareBalanceRelation()
    {
        return $this->hasMany(ShareBalance::class, 'parent_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
