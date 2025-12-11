<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SerialNo extends Model
{
    use HasFactory;

    protected $table = 'serial_no'; // or 'serial_and_batch_entry' depending on ERPNext version, assuming serial_no for now
    protected $guarded = [];
}
