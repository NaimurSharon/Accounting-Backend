<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscountedInvoice extends Model
{
    use HasFactory;

    protected $table = 'discounted_invoice';
    protected $guarded = [];
}
