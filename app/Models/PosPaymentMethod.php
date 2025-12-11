<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PosPaymentMethod extends Model
{
    use HasFactory;

    protected $table = 'pos_payment_method';

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
        'mode_of_payment_id',
        'allow_in_returns'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'default' => 'boolean',
        'allow_in_returns' => 'boolean',
    ];

    public function posProfile()
    {
        return $this->belongsTo(PosProfile::class, 'parent_id');
    }
}
