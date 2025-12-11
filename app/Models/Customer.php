<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customer';
    protected $guarded = [];

    public function scopeActive($query)
    {
        return $query->where('disabled', 0);
    }

    public function salesInvoices()
    {
        return $this->hasMany(SalesInvoice::class);
    }
}
