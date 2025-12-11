<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionSettings extends Model
{
    use HasFactory;

    protected $table = 'subscription_settings';

    protected $fillable = [
        'name',
        'creation',
        'modified',
        'modified_by',
        'owner',
        'docstatus',
        'idx',
        'grace_period',
        'cancel_after_grace',
        'prorate'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'cancel_after_grace' => 'boolean',
        'prorate' => 'boolean',
    ];
}
