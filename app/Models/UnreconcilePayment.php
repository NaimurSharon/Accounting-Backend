<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnreconcilePayment extends Model
{
    use HasFactory;

    protected $table = 'unreconcile_payment';

    protected $fillable = [
        'name',
        'creation',
        'modified',
        'modified_by',
        'owner',
        'docstatus',
        'idx',
        'amended_from_id',
        'company_id',
        'voucher_type_id', // Link to DocType
        'voucher_no',
        'allocations' // Child table
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
    ];

    public function allocationsRelation()
    {
        return $this->hasMany(UnreconcilePaymentEntries::class, 'parent_id');
    }
}
