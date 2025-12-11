<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashierClosing extends Model
{
    use HasFactory;

    protected $table = 'cashier_closing';

    protected $fillable = [
        'name',
        'creation',
        'modified',
        'modified_by',
        'owner',
        'docstatus',
        'idx',
        'naming_series',
        'user_id',
        'date',
        'from_time',
        'time',
        'expense',
        'custody',
        'returns',
        'outstanding_amount',
        'payments', // JSON or text
        'net_amount',
        'amended_from_id'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'date' => 'date',
        // 'time' => 'time', // Laravel doesn't have time cast by default but we can leave as string or use custom
        // 'from_time' => 'time',
        'expense' => 'decimal:2',
        'custody' => 'decimal:2',
        'returns' => 'decimal:2',
        'outstanding_amount' => 'decimal:2',
        'net_amount' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class); // Assuming User model exists or will exist
    }

    public function paymentsRelation()
    {
        return $this->hasMany(CashierClosingPayments::class, 'parent_id');
    }
}
