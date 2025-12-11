<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionPlanDetail extends Model
{
    use HasFactory;

    protected $table = 'subscription_plan_detail';

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
        'qty',
        'plan_id'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
    ];

    public function subscription()
    {
        return $this->belongsTo(Subscription::class, 'parent_id');
    }
}
