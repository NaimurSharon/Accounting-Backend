<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PosCustomerGroup extends Model
{
    use HasFactory;

    protected $table = 'pos_customer_group';
    protected $guarded = [];
}
