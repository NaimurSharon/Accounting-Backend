<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModeOfPayment extends Model
{
    use HasFactory;

    protected $table = 'mode_of_payment';

    protected $fillable = [
        'name',
        'creation',
        'modified',
        'modified_by',
        'owner',
        'docstatus',
        'idx',
        'mode_of_payment',
        'type',
        'accounts',
        'enabled'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'enabled' => 'boolean',
    ];

    public function accountsRelation()
    {
        return $this->hasMany(ModeOfPaymentAccount::class, 'parent_id');
    }
}
